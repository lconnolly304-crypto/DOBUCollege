<?php
session_start();

$message = "";
$success_message = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
   $db_host = 'localhost';
   $db_name = 'do_bu_database';
   $db_username = 'root';
   $db_password = '';

   try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $stmt = $pdo->prepare("INSERT INTO contact_messages (firstname, lastname, email, message) VALUES (:firstname, :lastname, :email, :message)");

        $stmt->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'message' => $message
        ]);

        $success_message = "Thank You For Your Message, " .htmlspecialchars($firstname) . " Our Team Will Respond To You As Soon As Possible";
   }
    catch(PDOException $e) {
    $error_message = "Database Error: " . $e->getMessage();
    #$error_message = "Database Connection Error, Please Refresh The Page And Try Again.";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ContactUs</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>

<main class="contact-container">
    <form class="contact-us-form card" method="POST" action="contact_us.php">
        <h2>CONTACT US</h2>
        <hr class="account-divider"> <p class="contact-title">Have a query? Sends us a message and one of our team members will respond to you shortly</p>

        <?php if (!empty($success_message)): ?>
            <p style="text-align: center; font-weight: bold; font-size: 18px; color: green;">
                <?php echo $success_message; ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            <p style="text-align: center; font-weight: bold; font-size: 18px; color: red;">
                <?php echo $error_message; ?>
            </p>
        <?php endif; ?>

        <div class="name-row">
            <div class="input-section">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" required placeholder="Enter your first name">
            </div>
            <div class="input-section">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" required placeholder="Enter your last name">
            </div>
        </div>

        <div class="input-section">
            <label for="email">Email / Username</label>
            <input type="text" id="email" name="email" required placeholder="Enter your email">
        </div>
        <div class="input-section">
            <label for="message">Message</label>
            <textarea  id="message" name="message" rows="8" required placeholder="Enter your message..."></textarea>
        </div>   

        <button type="submit" class="contact-us-button">SUBMIT</button>
    </form>
</main>

<?php include 'footer.html'; ?>
</body>
</html>