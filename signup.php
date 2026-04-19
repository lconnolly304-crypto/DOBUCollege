<?php

session_start();

$error_message = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = 'localhost';
    $db_name = 'do_bu_database';
    $db_username = 'root';
    $db_password = '';

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($password != $confirmPassword) {
            $error_message = "The Passwords Entered Do Not Match, Please Try Again.";
        }

        elseif (strlen($password) < 8) {
            $error_message = "Your Password Must Be At Least 8 Characters Long.";
        }
        else {
            $check_stmt = $pdo->prepare(("SELECT id FROM users WHERE email = :email"));
            $check_stmt->execute(['email' => $email]);

            if ($check_stmt->rowCount() > 0) {
                $error_message = 'That Email Is Already Registred To An Account, Please Use A Diffrent Email';
            }
            else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $insert_stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:fname, :lname, :email, :password)");

                $insert_stmt->execute([
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'password' => $hashed_password
                ]);

                header("Location: login.php");
                exit();
            }
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
    <title>Signup</title>
</head>
<body>

<?php include 'navbar.php'; ?>

<main class="details-container">
    <form class="login-form" method="POST" action="signup.php">
        <h2>SIGNUP</h2>

        <?php if (!empty($error_message)): ?>
            <p style="color: red; font-weight: bold; text-align: center;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" required placeholder="Enter Your First Name">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" required placeholder="Enter Your Last Name">
        
        <label for="email">Email / Username</label>
        <input type="text" id="email" name="email" required placeholder="Enter Your Email">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" minlength="8" required placeholder="Create A Password">

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" minlength="8" name="confirmPassword" required placeholder="Confirm Your Password">

        <br>
        <a href="Login.php">Already have an account? Login</a>
        <br>

        <button type="submit" class="login-button">SIGNUP</button>
    </form>
</main>


<?php include 'footer.html'; ?>
</body>
</html>