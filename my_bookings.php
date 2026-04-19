<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

$db_host = 'localhost';
$db_name = 'do_bu_database';
$db_username = 'root';
$db_password = '';

$user_plans = [];
$message = '';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel_membership'])) {
        $cancel_membership_id = $_POST['cancel_membership'];

        $delete_stmt = $pdo->prepare("DELETE FROM memberships WHERE id = :id AND user_id = :user_id");
        $delete_stmt->execute ([
            'id' => $cancel_membership_id,
            'user_id' => $_SESSION['id']
        ]);

        $message = "Your Membership Has Successfully Been Canceled";
    }

    $stmt = $pdo->prepare("SELECT id, plan_name, price, purchase_date FROM memberships WHERE user_id = :user_id ORDER BY purchase_date DESC");

    $stmt ->execute(['user_id' => $_SESSION['id']]);
    $user_plans = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException) {
    $error_message = "Database Connection Error, Please Refresh The Page And Try Again.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Management</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>

<main class="my-bookings-page">
    <h1 class="booking-title">MY BOOKINGS & MEMBERSHIPS</h1>

    <?php if (!empty($message)): ?>
        <p style="text-align: center; font-weight: bold; font-size: 32px; color: green;">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>

    <section class="my-booking-section">
        <h2>CURRENT MEMBERSHIPS</h2>
        
        <div class="bookings-side-by-side">
            <?php if (count($user_plans) > 0): ?>
                <?php foreach ($user_plans as $plan): ?>

                <div class="my-bookings-card">
                    <div class="booking-card-title">
                        <h3><?php echo htmlspecialchars($plan['plan_name']); ?></h3>
                        <span class="status">Active</span>
                    </div>
                    <div class="booking-card-details">
                        <p><strong>Plan Type:</strong> <?php echo htmlspecialchars($plan['plan_name']); ?></p>

                        <p><strong>Purchased On:</strong> <?php echo date("F j, Y", strtotime($plan['purchase_date'])); ?></p>

                        <p><strong>Cost:</strong> <?php echo htmlspecialchars($plan['price']); ?></p>
                    </div>

                    <form method="POST" action="" onsubmit="return confirm('Are You Sure You Want To Cancel? This Action Can Not Be Undone')">
                        <input type="hidden" name="cancel_membership" value="<?php echo $plan['id'];  ?>">
                        <button class="cancel-button">Cancel Membership</button>
                    </form>
                    
                </div>

                <?php endforeach; ?>
              <?php else: ?>
                <p style="padding: 25px; font-size: 22px; color: green">You Currently Do Not Have Any Active Membership Plans Or Courses. <a href="Booking.php" style="color: black;">Take Out A Membership Or Book A Course Here</a></p>

            <?php endif; ?>
        </div>
    </section>
</main>


<?php include 'footer.html'; ?>
</body>
</html>