<?php include_once("Header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Durbar Restaurant</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href=
"..//images/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color:#bbbfbc;
            padding-top: 60px; /* Add padding to account for the fixed navbar */
        }

        .about-us {
            text-align: center;
            padding: 20px;
            position: relative;
        }

        .about-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px
            margin-top: 5%;
        }

        .image-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
            position: relative;
            margin-top: 10px;
        }
        .image-container img {
            margin-top: -100px;
            width: 100%;
            height: 100%;
            object-fit: contain; /* Ensures the entire image fits without distortion */
        }

        .about-image img:hover {
            transform: scale(1.1);
        }

        .section-title {
            position: absolute;
            top: 10%;
            color: black;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            z-index: 1;
            text-align: center;
            font-size: 3rem;
            margin: 0;
            font-family: 'Arial', sans-serif; /* Choose a strong font like Arial or Impact */
  font-size: 5rem; /* Adjust the size as needed */
  font-weight: bold;
  text-transform: uppercase;
  color: white; /* White color for text */
  margin-top: 10%; /* Adjust the top margin */
  text-shadow: 5px 5px 2px rgba(0, 0, 0, 0.7); /* Shadow effect for the text */
  letter-spacing: 2px; /* Slight space between letters */
"
        }

        /* Album Section */
        .album {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .album-item {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .album-item:hover {
            transform: scale(1.05);
        }
.album-item img :hover {
           transform: scale(1.2);
        }
        .album-item img {
            width: 100%;
            height: auto;
            aspect-ratio: 4/3;
        }

        .album-item-details {
            padding: 10px;
            text-align: center;
        }

        .album-item-details h3 {
            margin: 10px 0;
            font-size: 1.2em;
        }

        .album-item-details p {
            color: #555;
        }

        /* Where We Located Section */
        .location {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .map-container {
        width: 100%;
        height: 100%;
        position: relative;
    }

    iframe {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }
       .menu{
        position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 10px;
       }
        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding-top: 80px; /* Adjust padding for smaller screens */
            }

            .about-content {
                font-family: 'Poppins', sans-serif;
                font-size: 22px;
                flex-direction: column;
                text-align: justify;
                line-height: 1.6 ;
            }
            .about-text, p{
                font-family: 'Poppins', sans-serif;
                font-size: 22px;
                text-align: justify;
                line-height: 1.6 ;
            }
            .about-text, .about-image {
                width: 100%;
                font-family: 'Poppins', sans-serif;
            }

           

            .album-item {
                width: 100%;
            }
        

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    }
    </style>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <section class="about-us">
        <div class="container">
            <h1 class="section-title" style="font-family: 'Arial', sans-serif; /* Choose a strong font like Arial or Impact */
  font-size: 5rem; /* Adjust the size as needed */
  font-weight: bold;
  text-transform: uppercase;
  color: white; /* White color for text */
  margin-top: 10%; /* Adjust the top margin */
  text-shadow: 5px 5px 2px rgba(0, 0, 0, 0.7); /* Shadow effect for the text */
  letter-spacing: 2px; /* Slight space between letters */
">About Us</h1>
            <div class="about-content">
                
                <div class="image-container">
        <img src="..//images/aboutus1.jpeg" alt="Full Screen Image">
    </div>
    <div class="about-text">
                    <h2>Discover the Authentic Taste of Nepal & India</h2>
                   <br>
<p>Vítejte v Diyalo Indická Restaurace, kde se teplo tradiční indické a nepálské 
    kuchyně setkává se srdcem České republiky. Název Diyalo v nepálštině znamená 
    „teplý svit“ nebo „záře“, což symbolizuje světlo a pohodu, kterou nám jídlo přináší.
     Stejně jako hřejivý plamen chceme šířit pohostinnost a lásku k autentickým pokrmům, 
     které připravujeme s péčí a podle starodávných receptů. Náš tým rodilých Indů a 
     Nepálců s láskou připravuje každý pokrm, aby vám přinesl opravdový orientální zážitek. Od rušných ulic Indie až po klidná údolí Nepálu – naše kuchyně přináší autentickou chuť orientu do malebného města Česká Lípa.
<br>
<br>


Naše menu uspokojí širokou škálu chutí a preferencí. Pro vegetariány
 nabízíme pestrý výběr bezmasých pokrmů, zatímco milovníci masa si mohou 
 pochutnat na kuřecím, vepřovém, jehněčím, rybách nebo krevetách. Ať už máte chuť na pikantní speciality nebo jemnější chutě, u nás si vybere každý, včetně těch nejmenších. Naší specialitou je tradiční Tandoori pec, která dodává našim pokrmům jedinečnou vůni a chuť, jakou jinde nenajdete. V Diyalo oslavujeme harmonii tradice a komunity a nabízíme útulnou atmosféru, kde se každý cítí jako doma. Přijďte a objevte bohaté chutě a pohostinnost, které činí Diyalo zářivým majákem 
kulinářského umění v České republice.</p>

                </div>
            </div>
        </div>
    </section>
    <div class="menu">
<button onclick="navigateTo('menu.php')">Zobrazit menu</button>
</div>
<!-- 
    <center><h1>Our Team</h1></center>
    <div class="album">
        <div class="album-item">
            <img src="../images/yaduram.jpg" alt="Photo 1">
            <div class="album-item-details">
                <h3>Dr.Yaduram Panthi</h3>
                <p>Incharge of Marketing Department</p>
            </div>
        </div>
        <div class="album-item">
            <img src="../images/21 jídlo.jpg" alt="Photo 2">
            <div class="album-item-details">
                <h3>Photo 2</h3>
                <p>Marketing Manager 2.</p>
            </div>
        </div>
        <div class="album-item">
            <img src="../images/1 polévka.jpg" alt="Photo 3">
            <div class="album-item-details">
                <h3>Photo 3</h3>
                <p>Details about photo 3.</p>
            </div>
        </div>
    </div> -->

    <div class="location">
    <h2>Where are we located</h2>
    <div class="map-container">
 <!-- Include Google Maps API -->
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2105.323558120833!2d14.547563727997733!3d50.68495848615563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4709695653c3a0cf%3A0xf0cd41a0a4575747!2zTGliZXJlY2vDoSA2NTgvNjEsIDQ3MCAwMSDEjGVza8OhIEzDrXBhIDEsIEN6ZWNoaWE!5e0!3m2!1sen!2snp!4v1734275196560!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
