<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick Up Details</title>
    <link rel="icon" href=
    "..//images/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin-top: 90px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            background-color: #000; /* Dark black background */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: borderAnimation 3s infinite;
        }

        @keyframes borderAnimation {
            0% {
                border: 2px solid red;
            }
            33% {
                border: 2px solid green;
            }
            66% {
                border: 2px solid blue;
            }
            100% {
                border: 2px solid red;
            }
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.8); /* Transparent white text */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2); /* Transparent input background */
            color: white; /* White text */
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <h1>Pick Up Details</h1>
    <form action="submit_order.php" method="post">
    <label for="full-name">Full Name:</label>
    <input type="text" id="full-name" name="full_name" required><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br>

    <label for="mobile-number">Mobile Number:</label>
    <input type="text" id="mobile-number" name="mobile_number" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <button type="submit">Submit</button>
</form>
    
<script>
    function submitOrder() {
        const cart = [
            // Example cart data
            { food_id: 1, quantity: 2, price: 10.00 },
            { food_id: 2, quantity: 1, price: 15.00 }
        ];

        $.ajax({
            url: 'submit_order.php',
            type: 'POST',
            data: { cart: JSON.stringify(cart) },
            success: function(response) {
                alert(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

<button onclick="submitOrder()">Submit Order</button>
<?php include_once 'footer.php'; ?>
</body>
</html>