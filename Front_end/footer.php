<head>
    <!-- Other head content -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    /* Body and main content */
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh; /* Ensures the content takes up full height */
        display: flex;
        flex-direction: column;
    }

    /* Footer Section */
    .footer {
        background-color: #333;
        color: white;
        padding: 20px 0;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        display: none; /* Initially hidden */
    }

    /* To show footer after scrolling */
    body.scrolled .footer {
        display: block;
    }

    .footer-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .footer-section {
        margin: 10px;
        flex: 1;
        min-width: 220px; /* Ensures each section doesn't get too small */
    }

    .footer-section h3 {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .social-icons {
        display: flex;
        justify-content: center;
    }

    .social-icons a {
        margin: 0 10px;
        color: white;
        font-size: 24px;
        text-decoration: none;
    }

    .contact-info {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
    }

    .contact-info i {
        margin-right: 10px;
    }

    /* Bottom footer section */
    .footer-bottom {
        text-align: center;
        padding: 10px 0;
        background-color: #222;
        color: #bbb;
    }

    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
        }

        .footer-section {
            width: 100%;
            text-align: center;
            margin: 10px 0;
        }

        .social-icons a {
            font-size: 20px; /* Adjust icon size on smaller screens */
        }
    }

    @media (max-width: 480px) {
        .footer-section h3 {
            font-size: 16px; /* Reduce heading size for very small screens */
        }

        .contact-info {
            flex-direction: column;
            text-align: center;
        }

        .contact-info i {
            margin-bottom: 5px;
        }
    }
</style>

<!-- Footer Section -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/yourprofile" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/yourprofile" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="mailto:contact@yourrestaurant.com">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Location</h3>
            <p>123 Main Street, City, Country</p>
        </div>
    
        <div class="footer-section">
            <h3>Contact Us</h3>
            <div class="contact-info">
                <i class="fas fa-envelope"></i>
                <p>Email: contact@yourrestaurant.com</p>
            </div>
            <div class="contact-info">
                <i class="fas fa-phone"></i>
                <p>Phone: (123) 456-7890</p>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Your Restaurant. All rights reserved.</p>
    </div>
</footer>

<!-- JavaScript to detect scroll -->
<script>
    window.onscroll = function() {
        if (window.scrollY > 1000) { // Change 100 to any number based on when you want to show the footer
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    };
</script>

</body>
</html>
