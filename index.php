<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MainMenuPage</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>

<main>
    <section class="top-section">
        <div class="text-overlay">
            <h1>Welcome to DO BU</h1>
            <a href="booking.php" class="side-button">Book Your Session</a>
        </div>
    </section>

    <section class="side-by-side-section">
        <div class="side-image">
            <img src="assets/Course_image_1.png" alt="Course Image">
        </div>
        <div class="side-content">
            <h2>Top Courses</h2>
            <p>Discover the range of courses we offer here at DO BU martial arts, designed to build your skills in martial arts. Weather your a semi professional or just starting our we have somthing for you  </p>
            <a href="booking.php" class="side-button">View Courses</a>
        </div>
    </section>

    <section class="side-by-side-section">
        <div class="side-content">
            <h2>Our Team</h2>
            <p>Our instructors compramise of highly trained professionals who have years of real world experiance in the industry, with a passion to pass on their skills and guid you on your martial arts jounrney</p>
            <a href="infomation.php" class="side-button">Meet The Team</a>
        </div>
        <div class="side-image">
            <img src="assets/instructor_image_1.png" alt="Team Member Image">
        </div>
    </section>

    <section class="bottom-section">
        <div class="tripple-section">
            <h2>Find Us</h2>
            <p>We are convenitently located on an easy to access location the outskirts of abingdon, with a bus route the stops right out side and free parking avaliable to all members</p>
            <a href="about_us.php" class="side-button">Find Us Here</a>
        </div>


        <div class="tripple-section">
            <h2>Testimonials</h2>

            <div class="testimonial-slideshow">
                <button class="slide-button prev-button"><i class="fa solid fa-chevron-left"></i></button>

                <div class="slide active">
                    <p>Example Review...</p>
                    <strong> - John Doe. </strong>
                </div>
                <div class="slide">
                    <p>Example Review</p>
                    <strong> - Alice Smith. </strong>
                </div>
                <div class="slide">
                    <p>Example Review</p>
                    <strong> - James Thomas. </strong>
                </div>

                <button class="slide-button next-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            

            <a href="about_us.php" class="side-button">Read More</a>
            
        </div>

       
        


        <div class="tripple-section">
            <h2>Become A Member?</h2>
            <p>Take the first step in beceoming a master at martial arts, click the link below and join our growing community today</p>
            <a href="booking.php" class="side-button">Join Us Now</a>
        </div>
    </section>
</main>

<?php include 'footer.html'; ?>
</body>
</html>

<script>
    const slides = document.querySelectorAll('.slide');
    const nextButton = document.querySelector('.next-button');
    const prevButton = document.querySelector('.prev-button');

    let currentSlide = 0;
    let sliderTimer

    function showNextSlide () {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) %slides.length;
    slides[currentSlide].classList.add('active');
    }

    function showPrevSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        slides[currentSlide].classList.add('active')
    }

    function startAutoPlay() {
        slideTimer = setInterval(showNextSlide, 4500)
    }

    function resetTimer() {
        clearInterval(slideTimer)
        startAutoPlay();
    }


    // Respond to prev / next button clicks
    nextButton.addEventListener('click', () => {
        showNextSlide();
    })

    prevButton.addEventListener('click', () => {
        showPrevSlide();
    })

   startAutoPlay();
</script>