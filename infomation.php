<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Information</title>
</head>
<body class="site-container">

<?php include 'navbar.php'; ?>


<main class="infomation-page">
    <section class="info-section">
        <h2>MEET THE TEAM</h2>
        <div class="team-layout">
            <div class="team-card">
                <img src="assets/teamMember1.png" alt="Team Member 1 Image">
                <h1>Mauricio Gomex</h1>
                <p>Gym owner and head martial arts coach</p>

                <details class="team-details">
                    <summary>Read More</summary>
                    <p class="member-details">Mauricio is the owner of DO BU and our head martial arts coach. <br> He is a qualifed 4th dan blackbelt in judo, a 3rd dan blackbelt in jiu-jitsu, a first dan blackbelt in karate and an accredited myau thai coach </p>
                </details>
            </div>
            <div class="team-card">
                <img src="assets/teamMember4.png" alt="Team Member 2 Image">
                <h1>Sarah Nova</h1>
                <p>Assistant martial arts coach</p>

                <details class="team-details">
                    <summary>Read More</summary>
                    <p class="member-details">Sarah is a assitant martial arts coach and a 5th dan in karate.</p>
                </details>
            </div>
            <div class="team-card">
                <img src="assets/instructor_image_1.png" alt="Team Member 3 Image">
                <h1>Guy Victory</h1>
                <p>Assistant martial arts coach</p>

                <details class="team-details">
                    <summary>Read More</summary>
                    <p class="member-details">Guy is a assistant martial arts coach and a 2nd dan blackbelt in jiu-jitsu and a 1st dan blackbelt in judo</p>
                </details>
            </div>
            <div class="team-card">
                <img src="assets/teamMember3.png" alt="Team Member 3 Image">
                <h1>Morris Davis</h1>
                <p>Assistant martial arts coach</p>

                <details class="team-details">
                    <summary>Read More</summary>
                    <p class="member-details">Morris is a assistant martial arts coach and a accredited muay thai coach and a 3rd dan blackbelt in karate</p>
                </details>
            </div>
            <div class="team-card">
                <img src="assets/teamMember6.png" alt="Team Member 4 Image">
                <h1>Traci Santiago</h1>
                <p>Fitness coach</p>

                <details class="team-details">
                    <summary>Read More</summary>
                    <p class="member-details">Traci is a fitness coach with a BSc in sports science, and qualifcation in health and nutrition, specalising in devising strength and conditioning programs for combat athletes</p>
                </details>
            </div>
            <div class="team-card">
                <img src="assets/teamMember5.png" alt="Team Member 4 Image">
                <h1>Harpreet Kaur</h1>
                <p>Fitness coach</p>

                <details class="team-details">
                    <summary>Read More</summary>
                    <p class="member-details">Harpreet is a fitness coach with a BSc in physiotherapy and a MSc in sports science</p>
                </details>
            </div>
        </div>
    </section>

    <hr class="account-divider">

    <section class="info-section gym-side-by-side">
        <div class="image-card">
            <img src="assets/gymImage1.png" alt="Inside The Gym 1">
        </div>
        <div class="info-card">
            <h2>OUR FACILITIES</h2>
            <p>We have a state of the art and well equipt gym equipt with a range of high quality equipment, such as a dedicated weight lifting area with weight up to 250kg, a dedicated cardio area with 10 running machines insuring you never have to wait for the tredmill. Further to this our gym contain martial arts traning area with punching bags, mats and body armor sets where you can practice your skills on your own or with other members.</p>
        </div>
        
    </section>

    <hr class="account-divider">

    <section class="info-section">
        <h2>MARTIAL ARTS WE TEACH</h2>
        <div class="class-section">
            <div class="class-card">
                <h2>Karate</h3>
                <p>Karate is more than physical combat; it is a way of life that cultivates discipline, mental focus, humility, and inner peace. True karate emphasizes self-control and non-violence, teaching practitioners to resolve conflict peacefully but, if necessary, to neutralize threats efficiently with minimal effort, a principle known as Ikken hissatsu (one strike, certain kill),. The ultimate goal is the perfection of character, achieved through consistent practice, reflection, and harmony between mind and body.</p>
            </div>
            <div class="class-card">
                <h2>Judo</h2>
                <p>Judo (Japanese: 柔道, meaning "gentle way") is an unarmed martial art developed in Japan in 1882 by Kanō Jigorō. It evolved from traditional jujutsu practiced by the samurai, but Kanō modified it to focus on safety, efficiency, and education, removing dangerous strikes and weapon techniques while emphasizing randori (free practice) over pre-arranged forms called kata. Practitioners are called judoka, and they wear a uniform called a judogi</p>
            </div>
            <div class="class-card">
                <h2>Jiu-Jitsu</h2>
                <p>Jujitsu, also spelled jiu-jitsu or ju-jitsu, originated in Japan as a martial art for the samurai of feudal Japan, designed to defeat armed and armored opponents without relying on weapons or using only short weapons. The term comes from the Japanese words jū meaning "gentle" or "yielding" and jutsu meaning "art" or "technique," reflecting the philosophy of manipulating an opponent’s energy rather than confronting it directly. Its core principle is to use leverage, timing, and technique to overcome opponents, making it effective even against larger or stronger adversaries</p>
            </div>
            <div class="class-card">
                <h2>MUAY THAI</h2>
                <p>Muay Thai is a traditional martial art that has evolved into a popular sport worldwide. It is characterized by its use of eight points of contact: the fists, elbows, knees, and shins. This makes it distinct from other striking arts, which typically focus on fewer points of contact. The sport emphasizes powerful strikes, clinch work, and conditioning, making it effective for both self-defense and competitive fighting.</p>
            </div>
        </div>
    </section>

    </div>
  </div>
</main>


<?php include 'footer.html'; ?>
</body>
</html>

<style>
    .infomation-page {
        flex: 1;
        padding: 60px 45px;
        background-color: white;
        max-width: 1200px;
        margin: auto;
        width: 100%;
    }

    .info-title {
        text-align: center;
        font-size: 62px;
        margin-bottom: 62px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
    }

    .info-section {
        margin-bottom: 54px;
    }

    .info-section h2 {
        text-align: center;
        font-size: 38px;
        margin-bottom: 32px;
        letter-spacing: 1.7px;
    }

    .team-layout {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(225px, 1fr));
        gap: 25px;
        text-align: center;
    }

    .team-card {
        background-color: white;
        padding: 18px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }

    .team-card:hover {
        transform: translateY(-4px);
    }

    .team-card img {
        width: 165px;
        height: 165px;
        border-radius: 55%;
        object-fit: cover;
        margin-bottom: 16px;
        border: 1px solid #333;
    }

    .team-card h3 {
        margin-bottom: 10px;
        font-size: 24px;
    }

    .team-card p {
        color: #444;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .class-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(225px, 1fr));
        gap: 25px;
    }

    .class-card {
        background-color: #333;
        color: white;
        padding: 25px;
        text-align: left;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        border-radius: 12px;
    }

    .class-card h3 {
        font-size: 26px;
        margin-bottom: 16px;
        border-bottom: 2px solid white;
        display: inline-block;
        padding-bottom: 6px;
        text-transform: uppercase;
    }

    .class-card p {
        line-height: 1.7;
        font-size: 16px;
        color: white;
    }

    .gym-side-by-side {
        display: flex;
        align-items: stretch;
        gap: 45px;
        background-color: white;
        padding: 45px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        padding: 0;
        overflow: hidden;
        gap: 0;
    }

    .gym-side-by-side .info-card{
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 42px;
    }

    .gym-side-by-side .info-card h2 {
        text-align: left;
        margin-bottom: 22px;
    }

    .gym-side-by-side .info-card p {
        line-height: 1.7;
        font-size: 18px;
        color: #444;
    }

    .gym-side-by-side .image-card {
        flex: 1;
        display: flex;
    }

    .gym-side-by-side .image-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

@media (max-width: 768px) {
    .gym-side-by-side {
        flex-direction: column;
    }
    .gym-side-by-side .info-card h2 {
        text-align: center;
    }
    } 

.team-details {
    margin-top: 15px;
}

.team-details summary {
    cursor: pointer;
    color: #8b2929;
    font-weight: bold;
    font-size: 16px;
    text-transform: uppercase;
    outline: none;
    list-style: none;
    margin-bottom: 12px;
    transition: color 0.2s;
}

.team-details summary:hover {
    color: darkred;
}

</style>