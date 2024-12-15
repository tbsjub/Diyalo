<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diyalo Restaurant</title>
    <style>
        /* Reset some basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: rgba(10, 9, 9, 0.5); /* Black with 50% opacity */
            background-position: center; /* Center the background image */
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }


        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 50px;
            margin-right: 10px;
        }

        .restaurant-name {
            color: white;
        }

        .navbar-items {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .navbar-item {
            margin-left: 20px;
            color: white;
            text-decoration: none;
            transition: color 0.1s ease;
        }

        .navbar-item:hover {
            background-color: transparent;
            font-weight: bolder;
            color:rgb(172, 210, 77); /* Change to your desired hover color */
        }

        .menu-icon {
            display: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .navbar-items {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 20px;
                background-color: rgba(0, 0, 0, 0.8);
                padding: 10px;
                border-radius: 5px;
            }

            .menu-icon {
                display: block;
            }
        }
    </style>
</head>
<body>
    
    <div class="navbar">
        <div class="logo-container">
            <img src="..//images/Logo.png" alt="Restaurant Logo" class="logo">
            <div class="restaurant-name">Diyalo Restaurant</div>
        </div>
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
        <div class="navbar-items">
            <a href="Indexx.php" class="navbar-item">Home</a>
            <a href="menu.php" class="navbar-item">Menu</a>
            <a href="about_us.php" class="navbar-item">About Us</a>
            <a href="underCon.php" class="navbar-item">Order Food</a>
        </div>
    </div>
    <script>
        function toggleMenu() {
            const navbarItems = document.querySelector('.navbar-items');
            navbarItems.style.display = navbarItems.style.display === 'flex' ? 'none' : 'flex';
        }
    </script>
</body>
</html>
