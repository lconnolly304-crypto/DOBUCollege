<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['plan_name'])) {
    
   if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
   }

   $db_host = 'localhost';
   $db_name = 'do_bu_database';
   $db_username = 'root';
   $db_password = '';

   try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $plan_name = $_POST['plan_name'];
        $price = $_POST['price'];
        $user_id = $_SESSION['id'];

        $check_stmt = $pdo->prepare("SELECT id FROM memberships WHERE user_id = :user_id AND plan_name = :plan_name");
        $check_stmt->execute([
            'user_id' => $user_id,
            'plan_name' => $plan_name
        ]);

        if ($check_stmt->rowCount() > 0) {
            $message = "This Membership Has Already Been Purchased And Is Currently Valid On Your Account";
        }

        else {
            $insert_stmt = $pdo->prepare("INSERT INTO memberships (user_id, plan_name, price) VALUES (:user_id, :plan_name, :price)");

        $insert_stmt->execute([
            'user_id' => $user_id,
            'plan_name' => $plan_name,
            'price' => $price
        ]);

        $message = " The " . htmlspecialchars($plan_name) . " Has Successfully Been Purchased And Added to Your Account ";
        }

    }
    catch(PDOException) {
        $error_message = "Database Connection Error, Please Refresh The Page And Try Again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>

<main class="booking-page">
    <h1 class="booking-title">MEMBERSHIPS & BOOKING</h1>

        <?php if (!empty($message)): ?>
          <p style="text-align: center; font-weight: bold; font-size: 18px; color: green;">
            <?php echo $message; ?>
          </p>
        <?php endif; ?>

    <section class="booking-section">
        <h2>OUR Mmebership Options</h2>

        <div class="booking-layout">

        <div class="booking-card">
            <h3>Basic</h3>
            <p class="description">1 martial art - 2 sessions per week for a monthly fee</p>
            <p class="price">£25</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Basic">
                <input type="hidden" name="price" value="£25">
                <button class="purchase-button">Purchase Plan</button>
            </form>
           
        </div>

        <div class="booking-card">
            <h3>Intermediate</h3>
            <p class="description">1 martial art - 3 sessions per week for a monthly fee</p>
            <p class="price">£35</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Intermediate">
                <input type="hidden" name="price" value="£35">
                <button class="purchase-button">Purchase Plan</button>
            </form>
        </div>

        <div class="booking-card">
            <h3>Advanced</h3>
            <p class="description">any 2 martial arts - 5 sessions per week for a monthly fee</p>
            <p class="price">£45</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Advanced">
                <input type="hidden" name="price" value="£45">
                <button class="purchase-button">Purchase Plan</button>
            </form>

        </div>

        <div class="booking-card">
            <h3>Elite</h3>
            <p class="description">Unlimited classes for a monthly fee</p>
            <p class="price">£60</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Elite">
                <input type="hidden" name="price" value="£60">
                <button class="purchase-button">Purchase Plan</button>
            </form>
        </div>

        <div class="booking-card">
            <h3>Private</h3>
            <p class="description"> Private martial arts tuition for an hourly fee</p>
            <p class="price">£15</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Private">
                <input type="hidden" name="price" value="£15">
                <button class="purchase-button">Purchase Plan</button>
            </form>
        </div>

        <div class="booking-card">
            <h3>Junior</h3>
            <p class="description"> Classes for all kids martial arts sessions for a monthly fee</p>
            <p class="price">£25</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Junior">
                <input type="hidden" name="price" value="£25">
                <button class="purchase-button">Purchase Plan</button>
            </form>
        </div>
        
        </div>
    </section>

    <hr class="account-divider">

    <section class="booking-section">
        <H2>OUR SPECIALIST COURCES AND FITNESS TRANING PLANS</H2>

        <div class="booking-layout">
        
        <div class="booking-card">
            <h3>Self Defence</h3>
            <p class="description"> A six week self defence course for beginners - 2 x 1 hour sessions per week</p>
            <p class="price">£180</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Self Defence">
                <input type="hidden" name="price" value="£180">
                <button class="purchase-button">Purchase Course</button>
            </form>
        </div>

        <div class="booking-card">
            <h3>Fitness room</h3>
            <p class="description">Access are fitness room and facilitys for a fee charged per visit</p>
            <p class="price">£6</p>
            <form  method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Fitness Room">
                <input type="hidden" name="price" value="£6">
                <button class="purchase-button">Purchase Session</button>
            </form>
        </div>

        <div class="booking-card">
            <h3>Personal Training</h3>
            <p class="description">Receive fitness traning from one of our qualifed personal trainers for a fee charged per hour</p>
            <p class="price">£35</p>
            <form method="POST" action="booking.php">
                <input type="hidden" name="plan_name" value="Personal Training">
                <input type="hidden" name="price" value="£35">
                <button class="purchase-button">Purchase Session</button>
            </form>
        </div>
        </div>
    </section>

    <hr class="account-divider">

    <section class="time-table-section">
        <h2>MARTIAL ARTS CLASS TIMETABLE</h2>

        <div class="time-table-container">
            <table class="time-table">
                <thead>
                    <tr>
                        <th>TIME</th>
                        <th>MONDAY</th>
                        <th>TUESDAY</th>
                        <th>WEDNESDAY</th>
                        <th>THURSDAY</th>
                        <th>FRIDAY</th>
                        <th>SATURDAY</th>
                        <th>SUNDAY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time-column">06:00 - 07:30</td>
                        <td>Jiu-Jitsu</td>
                        <td>Karate</td>
                        <td>Judo</td>
                        <td>Jiu-Jitsu</td>
                        <td>Muay Thai</td>
                        <td>No Classes</td>
                        <td>No Classes</td>
                    </tr>
                    <tr>
                        <td class="time-column">08:00 - 10:00</td>
                        <td>Muay Thai</td>
                        <td>Private tuition</td>
                        <td>Private Tuition</td>
                        <td>Private Tuition</td>
                        <td>Jiu-Jitsu</td>
                        <td>Private Tuition</td>
                        <td>Private Tuition</td>
                    </tr>
                    <tr>
                        <td class="time-column">10:30 - 12:00</td>
                        <td>Private Tuition</td>
                        <td>Pirvate Tuition</td>
                        <td>Pirvate Tuition</td>
                        <td>Pirvate Tuition</td>
                        <td>Pirvate Tuition</td>
                        <td>Judo</td>
                        <td>Karate</td>
                    </tr>
                    <tr>
                        <td class="time-column">13:00 - 14:30</td>
                        <td>Open Mat / Personal Practice</td>
                        <td>Open Mat / Personal Practice</td>
                        <td>Open Mat / Personal Practice</td>
                        <td>Open Mat / Personal Practice</td>
                        <td>Open Mat / Personal Practice</td>
                        <td>Karate</td>
                        <td>Judo</td>
                    </tr>
                    <tr>
                        <td class="time-column">15:00 - 17:00</td>
                        <td>Kids Jiu-Jitsu</td>
                        <td>Kids Judo</td>
                        <td>Kids Karate</td>
                        <td>Kids Jiu-Jitsu</td>
                        <td>Kids Judo</td>
                        <td>Muay Thai</td>
                        <td>Jiu-Jitsu</td>
                    </tr>
                    <tr>
                        <td class="time-column">17:30 - 19:00</td>
                        <td>Karate</td>
                        <td>Muay Thai</td>
                        <td>Judo</td>
                        <td>Jiu-Jitsu</td>
                        <td>Muay Thai</td>
                        <td>No Classes</td>
                        <td>No Classes</td>
                    </tr>
                    <tr>
                        <td class="time-column">19:00 - 21:30</td>
                        <td>Jiu-Jitsu</td>
                        <td>Judo</td>
                        <td>Jiu-Jitsu</td>
                        <td>Karate</td>
                        <td>Private Tuition</td>
                        <td>No Classes</td>
                        <td>No Classes</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>


<?php include 'footer.html'; ?>
</body>
</html>
