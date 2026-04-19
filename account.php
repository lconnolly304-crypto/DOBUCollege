<?php

session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !==true) {
    header(('Location: login.php'));
    exit();
}

$message = "";

$db_host = 'localhost';
$db_name = 'do_bu_database';
$db_username = 'root';
$db_password = '';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT firstname, lastname, email, password, joined_date FROM users WHERE id =:id");
    $stmt->execute(['id' => $_SESSION['id']]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $full_name = $user_data['firstname'] . ' ' . $user_data['lastname'];
    $email = $user_data['email'];
    $joined_date = $user_data['joined_date'];

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['oldPassword'])) {
        $old_password = $_POST['oldPassword'];
        $new_password = $_POST['newPassword'];

        if (password_verify($old_password, $user_data['password'])) {
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_stmt = $pdo->prepare(("UPDATE users SET password = :new_password WHERE id = :id"));
            $update_stmt->execute([
                'new_password' => $new_hashed_password,
                'id' => $_SESSION['id']
        ]);

        $message = "Your Password Has Successfully Been Updated";
        }
        else {
            $message = "Old Password Incorrect, Please Try Again";
        }
    } 
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
    <title>Account Management</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>


<main class="account-management-page">
    <h1 class="account-title">Account Management</h1>

    <div class="account-grid">
        <section class="card profile-card">
            <i class="fa-solid fa-circle-user profile-large-icon"></i>
            <h2>My Profile</h2>
            <h3><?php echo htmlspecialchars($full_name)?></h3>
            <p class="user-email-text"><?php echo htmlspecialchars($email);?></p>

            <hr class="account-divider">

            <div class="user-details">
                <p><strong>Full Name:</strong><?php echo htmlspecialchars($full_name)?></p>
                <p><strong>Email:</strong><?php echo htmlspecialchars($email)?></p>
                <p><strong>Joined:</strong><?php echo htmlspecialchars($joined_date)?></p>
            </div>
        </section>
    

      <div class="settings-column">
        <section class="card theme-card">
            <h2>Appearance</h2>
            <hr class="account-divider">
            <div class="toggle-container">
                <p>Toggle Light / Dark Mode</p>
                <label class="switch-toggle">
                    <input type="checkbox" id="darkModeToggle">
                    <span class="slider round"></span>
                </label>
            </div>
        </section>

        <section class="card password-card">
            <h2>Change Your Password</h2>
            
            <hr class="account-divider">

            <?php if (!empty($message)): ?>
                <p style="font-weight: bold; text-align: center; color: Green;">
                    <?php echo $message; ?>
                </p>
            <?php endif ?>

            <form class="password-form" method="POST" action="account.php">
                <div class="input-section">
                    <label for="oldPassword">Old Password</label>
                    <input type="password" name="oldPassword" id="oldPassword" required>
                </div>

                <div class="input-section">
                    <label for="newPassword">New Password</label>
                    <input type="password" name="newPassword" id="newPassword" required>
                </div>

                <button class="side-button">Update Password</button>
            </form>
        </section>
       </div>
    </div>
  </div>
</main>

<?php include 'footer.html'; ?>

</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        const themeToggle = document.getElementById('darkModeToggle');

        themeToggle.checked = localStorage.getItem('darkMode') === 'true';

        themeToggle.addEventListener('change', function () {
            if (this.checked) {
                document.documentElement.classList.add('dark-mode');
                localStorage.setItem('darkMode', 'true');
            }
            else {
                document.documentElement.classList.remove('dark-mode');
                localStorage.setItem('darkMode', 'false');
            }
        });
    });
</script>