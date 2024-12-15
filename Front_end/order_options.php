<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Options</title>
    <link rel="icon" href=
    "..//images/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Center the order options and style the cards */
        .body {
            font-family: Arial, sans-serif;
            background-color:rgb(243, 238, 237);
            margin-top: 70px;
            
            padding: 0;
        }
        .body h1 {
            text-align: center;
            margin-top: 20px;
        }
        #order-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px auto;
            width: 80%;
        }
        .option {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #454545;
            border: 1px solid #ccc;
            padding: 20px;
            width: 30%;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .option img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }
        .option button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .option button:hover {
            background-color: #0056b3;
        }

        .footer {
           
           left: 0;
           bottom: 0;
           width: 100%;
           height: 100px;
           background-color: #333;
           color: white;
           text-align: center;
           position: fixed;
       }
    </style>
</head>
<body class="body">
    <?php include_once 'header.php'; ?>

    <h1 st>Choose an Option</h1>
    <div id="order-options">
        <div class="option">
          
            <img src="..//images/pickingup.png" alt="Pick up at Restaurant" class="option-image">
            <a href=""> <button id="pickup-btn">Direct from Restaurant </button>
            </a>
            <p style="color:white"> with 10% discount upto 1000cz   within 10 km </p>
        </div>
        <div class="option">
            <img src="..//images/delivery.png" alt="Deliver to Address" class="option-image">
            <a href="food_delievery.php"> <button id="delivery-btn">Online food delivery</button></a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#pickup-btn').click(function() {
                window.location.href = 'pickup.php';
            });

            $('#delivery-btn').click(function() {
                window.location.href = 'delivery.php';
            });
        });
    </script>
    <div class="footer">
    <?php include_once 'footer.php'; ?>
    </div>
</body>
</html>