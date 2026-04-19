<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accessability</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>

<main class="details-container">
    <form class="contact-us-form" id="accessabilityForm">
        <h2>ACCESSABILITY SETTINGS</h2>
 
        <label for="textSize">Adjust Text Size</label>
        <input type="range" id="textSize" name="textSize" min="1" max="5" step="1" value="1">

        <label for="contrastMode">Change Contrast</label>
        <div class="toggle-container">
            <span class="toggle-text">Low</span>
            
            <label class="toggle-switch" for="contrastMode">
                <input type="checkbox" id="contrastMode" name="contrastMode">
                <span class="contrast-slider"></span>
            </label>
            
            <span class="toggle-text">High</span>
        </div>

        <button type="submit" class="accessability-button">SAVE SETTINGS</button>
    </form>
</main>


<?php include 'footer.html'; ?>
</body>
</html> 

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const textSizeSlider = document.getElementById('textSize');
        const contrastToggle = document.getElementById('contrastMode');
        const form = document.getElementById('accessabilityForm');

        textSizeSlider.value = localStorage.getItem('textSize') || '1';
        contrastToggle.checked = localStorage.getItem('highContrast') === 'true';

        textSizeSlider.addEventListener('input', function() {
            let percentage = 100 + ((this.value - 1) * 10);
            document.documentElement.style.fontSize =percentage + '%';
        });

        contrastToggle.addEventListener('change', function () {
            if (this.checked) {
                document.documentElement.classList.add('high-contrast');
            }
            else {
                document.documentElement.classList.remove('high-contrast');
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            localStorage.setItem('textSize', textSizeSlider.value);
            localStorage.setItem('highContrast', contrastToggle.checked);
        });
    });
    
</script>