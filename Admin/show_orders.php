<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

include '../db_config.php';

// Create cart table with total column as a stored generated column
$sql_create_table = "
    CREATE TABLE IF NOT EXISTS cart (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        food_name VARCHAR(255) NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        total DECIMAL(10, 2) AS (quantity * price) STORED,
        FOREIGN KEY (user_id) REFERENCES pickup(id)
    )
";

if (!$conn->query($sql_create_table)) {
    die("Table creation failed: " . $conn->error);
}

// Fetch orders and user details
$sql = "
    SELECT 
        cart.id AS order_no, 
        cart.food_name, 
        cart.quantity, 
        cart.price, 
        (cart.quantity * cart.price) AS total, 
        pickup.full_name, 
        pickup.address, 
        pickup.mobile_number, 
        pickup.email 
    FROM cart 
    JOIN pickup ON cart.user_id = pickup.id
";

$orders = $conn->query($sql);

if (!$orders) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Orders</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            align-items: center;
            background-color: #333;
            padding: 10px;
        }
        .navbar img {
            height: 50px;
            margin-right: 20px;
        }
        .navbar .name {
            color: #fff;
            font-size: 24px;
            margin-right: auto;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            padding: 10px;
        }
        .navbar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="../Front_end/images/logo.png" alt="Restaurant Logo">
        <div class="name">Gurkha Restaurant</div>
        <a href="index.php">Home</a>
        <a href="admin.php">Add Food</a>
        <a href="show_orders.php">Show Orders</a>
    </div>
    <h1>Show Orders</h1>
    <h2>Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Food Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Mobile Number</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($order = $orders->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $order['order_no']; ?></td>
                    <td><?php echo $order['food_name']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td><?php echo $order['price']; ?></td>
                    <td><?php echo $order['total']; ?></td>
                    <td><?php echo $order['full_name']; ?></td>
                    <td><?php echo $order['address']; ?></td>
                    <td><?php echo $order['mobile_number']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>