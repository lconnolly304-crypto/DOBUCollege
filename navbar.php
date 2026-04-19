<?php 
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<nav class="navbar">
    <div class="logo">DO BU</div>

    <ul class="navbar-links">  
        <li><a href="index.php">Home</a></li>
        <li><a href="booking.php">Session Booking</a></li>
        <li><a href="my_bookings.php">My Bookings</a></li>
        <li><a href="infomation.php">Infomation</a></li>
    </ul>

    <div class="user-links">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?> 
        
        <span class="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?></span>
        
        <a href="account.php" class="profile-link">
            <i class="fa-regular fa-circle-user"></i>
        </a>

        <a href="logout.php" class="profile-link" title="logout" style="color: white; text-decoration: none; font-size: 18px;">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a> 

        <?php else: ?>

            <a href="login.php" class="welcome-message"></a>
            <a href="login.php" class="profile-link">
                <i class="fa-regular fa-circle-user"></i>
            </a>

        <?php endif; ?>
    </div>
</nav>

<script>
    (function() {
        const savedFontSize = localStorage.getItem('textSize') || '1';
        const isHighContrast = localStorage.getItem('highContrast') === 'true';
        const isDarkMode = localStorage.getItem('darkMode') === 'true';

        let sizePercentage = 100 + ((savedFontSize -1) * 10);
        document.documentElement.style.fontSize = sizePercentage + '%';

        if (isHighContrast) {
            document.documentElement.classList.add('high-contrast');
        }

        if(isDarkMode) {
            document.documentElement.classList.add('dark-mode');
        }
    })();
</script>
