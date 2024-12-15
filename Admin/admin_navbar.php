<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <div class="logo">
            <img src="../Front_end/images/logo.png" alt="Restaurant Logo">
        </div>
        <div class="name">Gurkha Restaurant</div>
        <a href="index.php">Home</a>
        <a href="admin.php">Add Food</a>
        <a href="show_orders.php">Show Orders</a>
        <div class="logout">
        <a href="?logout=true">Logout</a>
        </div>
    </div>
    </div>
    <?php
    if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<style>
       .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar .logo {
            float: left;
            padding: 14px 20px;
        }
        .navbar .logo img {
            height: 40px;
        }
        .navbar .name {
            float: left;
            color: #f2f2f2;
            padding: 14px 20px;
            font-size: 20px;
        }
        .navbar .logout {
            float: right;
        }   
        .logout {
            text-align: center;
            margin: 20px;
        }
        .logout a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            color: #0056b3;
        }
</style>
</body>
</html>