<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diyalo Restaurant</title>
    <link rel="icon" href=
    "..//images/Logo.png" type="image/x-icon" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #8B4513; /* Brown Background */
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: white;
        }

        .navbar ul {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .navbar ul li {
            margin: 0 10px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
        }

        .navbar ul li a:hover {
            text-decoration: underline;
        }

        .logo {
            height: 40px;
        }

        /* Hero Section */
        .hero {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            text-align: center;
            color: white;
            margin-top: 10px; /* Adjust for fixed navbar */
        }

        .hero-image {
            margin-top: 1px;
            width: 98%;
            height: 100%;
            object-fit: cover;
            color-overlay: rgba(0, 0, 0, 0.5);
        }

        .hero-buttons {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 10px;
            font-size: 5rem;
        }

        .hero-buttons button {
            padding: 10px 20px;
            font-size: 1.5 rem;
            cursor: pointer;
            border-radius: 20px;
            margin: 10px;
            border: 2px goldenrod solid;
            background-color: transparent;
            color: white;
            /* animation: borderColorChange 3s infinite; */
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

        @keyframes borderColorChange {
            0% {
                border-color: green;
            }
            33% {
                border-color: red;
            }
            66% {
                border-color: blue;
            }
            100% {
                border-color: green;
            }
        }

        /* About Section */
        .about {
            display: flex;
            align-items: center;
            padding: 50px 20px;
            background-color: #E8E8E8;
        }

        .about-image {
            width: 40%;
            margin-right: 20px;
            float: left;
        }

        .about-description {
            width: 60%;
        }

        /* Events Section */
        .events {
            text-align: center;
            padding: 50px 20px;
            background-color: #f5f5f5; /* Set background color for the events section */
            margin-top: 20px; /* Add margin to create a gap between sections */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 20px;
        }

        .event-description {
            margin-bottom: 20px;
        }

        .event-buttons button {
            margin: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
        }

        .event-image {
            width: 100%;
            max-width: 600px;
            height: auto;
            border-radius: 10px;
            animation: slideIn 1s ease-in-out;
            aspect-ratio: 4 / 3;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
       

        @keyframes colorShift {
            0% {
                background-position: 0%;
            }
            100% {
                background-position: 100%;
            }
        }

        .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 50px;
    max-width: 1200px;
    margin: 0 auto;
    margin-top: 20px;
    background-color: dimgrey;
}

/* Text Section */
.text-content {
    max-width: 50%;
}

.title {
    font-size: 3rem;
    font-weight: bold;
    color: #ffffff;
}

.underline {
    width: 50px;
    height: 2px;
    background-color: #ff9800;
    margin: 10px 0 20px 0;
}

.intro-text {
    font-size: 1.2rem;
    margin-bottom: 20px;
    color: #ff9800;
}

.description {
    font-size: 1rem;
    line-height: 1.8;
    color: #d4d4d4;
}

/* Image Section */
  /* Image Section */
  .image-content {
            max-width: 55%; /* Increase the max-width to make the image larger */
            position: relative;
        }

        .image-content img {
            width: 100%;
            border-radius: 10px;
        }
/* Decorative Lines (Optional) */
.image-content::before {
    content: "";
    position: absolute;
    top: 20px;
    right: -30px;
    width: 100px;
    height: 100px;
    border: 1px solid #ff9800;
    z-index: -1;
}

.special-event {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f4e1cb;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Header Section */
.event-header {
    text-align: center;
    margin-bottom: 30px;
}

.event-header p {
    font-size: 0.9rem;
    color: #555;
}

.event-header h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2b1c15;
}

/* Content Section */
.event-content {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;
}

/* Left Image Section */
.event-image {
    flex: 1;
    min-width: 300px;
}

.event-image img {
    width: 100%;
    border-radius: 10px;
}

/* Right Text Section */
.event-details {
    flex: 1;
    min-width: 300px;
    padding: 10px;
}

.event-details h2 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #2b1c15;
}

.event-details p {
    font-size: 1rem;
    margin-bottom: 20px;
}

.event-details strong {
    font-weight: bold;
}

.buttons {
    display: flex;
    gap: 10px;
    align-items: center;
}

.btn {
    background-color: #2b1c15;
    color: #fff;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 1rem;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.btn:hover {
    background-color: #44322b;
}

.link {
    font-size: 1rem;
    text-decoration: none;
    color: #2b1c15;
    font-weight: bold;
    border-bottom: 2px solid #2b1c15;
    transition: color 0.3s ease;
}

.link:hover {
    color: #7a5b47;
}
        /* Why This Restaurant */
        .why-us {
            padding: 50px 20px;
            text-align: center;
            background-color: #E8E8E8;
        }

        .why-cards {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card {
            width: 30%;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
        }

        .card p {
            padding: 10px;
            text-align: center;
        }

        .rating-container {
    width: 400px;
    background: #2a2a2a;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.rating-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}

label {
    font-size: 1.1rem;
    margin-right: 10px;
    flex: 1;
    text-align: left;
}

.stars {
    display: flex;
    gap: 5px;
    cursor: pointer;
    flex: 2;
}

.stars .star {
    font-size: 1.5rem;
    color: #555;
    transition: color 0.3s ease;
}

.stars .star.active {
    color: #f4c542;
}

.rating-value {
    font-size: 1rem;
    flex: 0.5;
    text-align: right;
}

  </style>
</head>
<body>
    <!-- Navbar -->
    <header>
       <?php include 'header.php'; ?>
    </header>

    <!-- Full-sized Image -->
    <section id="home" class="hero"> 
         <div class="image">
    <img src="../images/aboutus1 - Copy.jpeg" alt="Nepali Restaurace" class="hero-image">
        </div>
    </div>


       
       <div class="overlay"></div>
       <div class="overlay-text">
       <h1 class="section-title" style="font-family: 'Arial', sans-serif; /* Choose a strong font like Arial or Impact */
  font-size: 2rem; /* Adjust the size as needed */
  font-weight: bold;
  font-style: italic;
  text-transform: uppercase;
  color: white; /* White color for text */
  margin-top: 10%; /* Adjust the top margin */
  text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.7); /* Shadow effect for the text */
  letter-spacing: 2px; /* Slight space between letters */
">Vítejte v restauraci</h1>

<h1 class="section-title" style="font-family: 'Arial', sans-serif; /* Choose a strong font like Arial or Impact */
  font-size: 4rem; /* Adjust the size as needed */
  font-weight: bold;
  text-transform: uppercase;
  color: goldenrod; /* White color for text */
  margin-top: 14%; /* Adjust the top margin */
  text-shadow: 1px 1px 1px rgba(255, 255, 255, 255); /* Shadow effect for the text */
  letter-spacing: 2px; /* Slight space between letters */
"><span style="display: inline-block;">&#x1FA94;
</span>
Diyalo! <span style="display: inline-block; transform: scaleX(-1);">&#x1FA94;
</span>
</h1>
        </div>
        <div class="hero-buttons">
            <button onclick="navigateTo('menu.php')">Zobrazit menu</button>
            <button onclick="navigateTo('order.php')">Objednat jídlo</button>
            <button onclick="navigateTo('pickup.php')">Rezervovat jídlo</button>
        </div>
    </section>
    <div class="container">
        <!-- Text Section -->
        <div class="text-content">
            <h1 class="title">DIYALO </h1>
            <div class="underline"></div>
            <p class="intro-text">
                Come and experience a piece of India and Nepal with us!
            </p>
            <p class="description">
                We are a team of native Indians and Nepalese and we offer you oriental 
                cuisine prepared with love. We have a varied menu of meatless dishes 
                for vegetarians. Meat lovers will also find something for themselves. 
                We offer chicken, pork, lamb, fish, or shrimp. Our cuisine will offer 
                you very sharp or mild flavors, so don't be afraid to come with children. 
                The specialty of our cuisine is the unique Tandoori oven for preparing 
                dishes. Thanks to the recipe, the dishes from this oven are unique with 
                their distinctive aroma and taste.
            </p>
        </div>

        <!-- Image Section -->
        <div class="image-content">
            <img src="..//images/interior.jpeg" alt="Restaurant Interior">
        </div>
    </div> <section class="special-event">
        <!-- Event Header -->
        <div class="event-header">
            <p>You must not miss</p>
            <h1>OUR SPECIAL EVENT</h1>
        </div>
        
        <!-- Content Section -->
        <div class="event-content">
            <!-- Left Image Section -->
            <div class="event-image">
                <img src="image.png" alt="Happy Hour Event">
            </div>

            <!-- Right Text Section -->
            <div class="event-details">
                <h2>HAPPY HOUR</h2>
                <p>
                    Enjoy an afternoon of great food and drink with our exclusive 
                    <strong>15% discount on everything</strong>, offered every day 
                    <strong>from 3:00 PM to 6:00 PM</strong> - reserve your table today 
                    and indulge in our specialties!
                </p>
                <div class="event-buttons">
                    <a href="reserve.php"><button class="btn">Reserve a table</button></a>
                    <a href="#" class="link">View menu</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why This Restaurant -->
    <section id="why-us" class="why-us">
        <h2>Proč tato restaurace?</h2>
        <div class="why-cards">
            <div class="card">
                <img src="./images/delivery.gif" alt="Důvod 1">
                <p>Detail o důvodu 1...</p>
            </div>
            <div class="card">
                <img src="reason2.jpg" alt="Důvod 2">
                <p>Detail o důvodu 2...</p>
            </div>
            <div class="card">
                <img src="reason3.jpg" alt="Důvod 3">
                <p>Detail o důvodu 3...</p>
            </div>
        </div>

 
    <footer>
        <img src="./images/.jpg" alt="Footer Image" class="footer-image">
        <div class="footer-buttons">
            <button onclick="navigateTo('menu')">Zobrazit menu</button>
            <button onclick="navigateTo('order')">Objednat jídlo</button>
            <button onclick="navigateTo('reserve')">Rezervovat stůl</button>
        </div>
    </footer>

    <script>
        const events = [
            {
                title: "Speciální události 1",
                details: "Detaily o speciálních událostech 1...",
                image: "./images/boddy.jpeg"     },
            {
                title: "Speciální události 2",
                details: "Detaily o speciálních událostech 2...",
                image: "./images/event1.jpg"
            },
            {
                title: "Speciální události 3",
                details: "Detaily o speciálních událostech 3...",
                image: "./images/event2.jpg"
            }
        ];

        let currentEventIndex = 0;

        function changeEvent() {
            currentEventIndex = (currentEventIndex + 1) % events.length;
            const event = events[currentEventIndex];
            document.getElementById('event-title').innerText = event.title;
            document.getElementById('event-details').innerText = event.details;
            const eventImage = document.getElementById('event-image');
            eventImage.src = event.image;
            eventImage.alt = event.title;
            eventImage.style.animation = 'none';
            eventImage.offsetHeight; /* trigger reflow */
            eventImage.style.animation = null;
        }

        setInterval(changeEvent, 5000); // Change event every 5 seconds

        function navigateTo(page) {
            window.location.href = page;
        }
        function navigateTo(url) {
            window.location.href = url;
        }

        // JavaScript to handle text switching
        const texts = document.querySelectorAll('.colorful-text');
        let currentIndex = 0;

        function showNextText() {
            texts[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % texts.length;
            texts[currentIndex].classList.add('active');
        }

        setInterval(showNextText, 2000); // Change text every 3 seconds
        document.addEventListener("DOMContentLoaded", () => {
    const feedbackForm = document.getElementById("feedbackForm");
    const testimonialsContainer = document.getElementById("testimonials");

    feedbackForm.addEventListener("submit", (e) => {
        e.preventDefault();
    });
    function navigateTo(url) {
            window.location.href = url;
        }

        // JavaScript to handle text switching
        const texts = document.querySelectorAll('.colorful-text');
        let currentIndex = 0;

        function showNextText() {
            texts[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % texts.length;
            texts[currentIndex].classList.add('active');
        }
             // Show first popup
          

    });




    </script>
  <?php include_once 'footer.php'; ?>

</body>
</html>
