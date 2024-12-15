<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Nepali Restaurace</title>
    <link rel="icon" href=
    "..//images/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="index.php">Domů</a>
                <a href="mailto:restaurace@email.com">restaurace@email.com</a>
                <a href="tel:+420123456789">+420 123 456 789</a>
            </div>
            <div class="navbar-center">
                <ul>
                    <li><a href="index.php#home">Domů</a></li>
                    <li><a href="index.php#about">O nás</a></li>
                    <li><img src="./images/Logo.png" alt="Restaurace Logo" class="logo"></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="index.php#contact">Kontakt</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Cart Section -->
    <section id="cart" class="cart">
        <h1>Your Cart</h1>
        <div id="cart-items"></div>
        <div id="cart-total"></div>
        <button onclick="checkout()">Checkout</button>
    </section>

    <!-- Footer Section -->
    <footer>
        <img src="footer-image.jpg" alt="Footer Image" class="footer-image">
        <div class="footer-buttons">
            <button onclick="navigateTo('menu')">Zobrazit menu</button>
            <button onclick="navigateTo('order')">Objednat jídlo</button>
            <button onclick="navigateTo('reserve')">Rezervovat stůl</button>
        </div>
    </footer>
    <?php include_once 'footer.php'; ?>

</body>
</html>