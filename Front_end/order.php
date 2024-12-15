<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food</title>
    <link rel="icon" href=
    "..//images/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
         margin-top: 50px;
            padding: 0;
        }

        #food-categories {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .category {
            margin-bottom: 50px;
            text-align: center;
        }

        .category img {
            max-width: 20%;
            height: auto;
            border-radius: 10px;
        }

        .category h2 {
            font-size: 2rem;
            color: #333;
            margin-top: 20px;
        }

        .food-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .food-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 20px;
            width: calc(33% - 40px);
            box-sizing: border-box;
            transition: transform 0.3s;
        }

        .food-item:hover {
            transform: translateY(-10px);
        }

        .food-item h3 {
            color: #333;
            margin-top: 0;
        }

        .food-item p {
            color: #777;
        }

        .food-item button {
            background-color: #ff7f50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .food-item button:hover {
            background-color: #ff6347;
        }

        #cart {
            /* Remove or comment out the position property */
            /* position: fixed; */
            /* top: 100px; */
            /* right: 30px; */
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 10px;
            margin-top: 20px; /* Add some spacing from the content above */
        }

        #cart h2 {
            margin-top: 0;
            color: #333;
        }

        #cart-items {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .footer {
           
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100px;
            background-color: #333;
            color: white;
            text-align: center;
        }
        #cart-items li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            color: #555;
        }

        #cart-total {
            font-weight: bold;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
   
    <div id="food-categories">
        <?php
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'restaurant');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);

            if (!$result) {
                die("Error executing query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='category'>";
                    echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "'>";
                    echo "<h2>" . $row['name'] . "</h2>";

                    $itemsSql = "SELECT * FROM order_item WHERE category_id=" . $row['category_id'];
                    $itemsResult = $conn->query($itemsSql);

                    if (!$itemsResult) {
                        die("Error executing items query: " . $conn->error);
                    }

                    if ($itemsResult->num_rows > 0) {
                        echo "<div class='food-items'>";
                        while($item = $itemsResult->fetch_assoc()) {
                            echo "<div class='food-item'>";
                            echo "<h3>" . $item['name'] . "</h3>";
                            echo "<p>Price: $" . $item['price'] . "</p>";
                            echo "<button onclick=\"addToCart('" . $item['name'] . "', " . $item['price'] . ")\">Order</button>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<p>No categories available</p>";
            }
            $conn->close();
        ?>
    </div>

    <!-- Place the cart here, at the bottom of the page -->
    <div id="cart">
        <h2>Your Cart</h2>
        <ul id="cart-items"></ul>
        <div id="cart-total">Total: $0.00</div>
       <a href="order_options.php"> <button class="checkout-button">Checkout</button></a>
    </div>
    <script src="script.js"></script>
<div class="footer">
        <?php include 'footer.php'; ?>
   
    </div>
</body>
</html>
