<?php

session_start();

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = 'localhost';
    $db_name = 'do_bu_database';
    $db_username = 'root';
    $db_password = '';

    try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['logged_in'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['first_name'] = $user['firstname'];
        $_SESSION['last_name'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];

        header("Location: index.php");
        exit();
    }

    else {
        $error_message = "Invalid Email Or Password, Please Try Again";
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
    <title>Login</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>

<main class="details-container">
    <form class="login-form" method="POST" action="login.php">
        <h2>LOGIN</h2>

        <?php if (!empty($error_message)): ?>
            <p style="color: red; font-weight: bold; text-align: center;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <label for="email">Email / Username</label>
        <input type="text" id="email" name="email" required placeholder="Enter Your Email">

        <label for="password">PASSWORD</label>
        <input type="password" id="password" name="password" required placeholder="Enter Your Password">

        <br>
        <a href="signup.php">Dont have an account? SignUp</a>
        <br>

        <button type="submit" class="login-button">LOGIN</button>
    </form>
</main>

<?php include 'footer.html'; ?>
</body>
</html>