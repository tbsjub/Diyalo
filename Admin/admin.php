<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

include '../db_config.php';
include_once'admin_navbar.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $food_name = $_POST['food_name'];
        $food_description = $_POST['food_description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $allergens = $_POST['allergens'];

        $target_dir = "uploads/";

        // Check if the directory exists, create it if not
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        // Check if the directory is writable
        if (!is_writable($target_dir)) {
            die("Target directory is not writable. Please update permissions.");
        }
        

        $target_file = $target_dir . basename($_FILES["food_image"]["name"]);
        if (is_writable($target_dir)) {
            if (move_uploaded_file($_FILES["food_image"]["tmp_name"], $target_file)) {
                $food_image = "../images/" . basename($_FILES["food_image"]["name"]);
                $conn->query("INSERT INTO menu (food_name, food_image, food_description, price, category, allergens) VALUES ('$food_name', '$food_image', '$food_description', '$price', '$category', '$allergens')");
                echo "File uploaded and record added successfully!";
            } else {
                echo "Failed to move uploaded file. Please check file permissions.";
            }
        } else {
            echo "Target directory is not writable. Please update permissions.";
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        // Delete related rows in order_items first
        $conn->query("DELETE FROM order_items WHERE food_id = $id");
        if ($conn->query("DELETE FROM menu WHERE id = $id") === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $food_name = $_POST['food_name'];
        $food_description = $_POST['food_description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $allergens = $_POST['allergens'];

        // Handle file upload
        if ($_FILES["food_image"]["name"]) {
            $target_dir = __DIR__ . './images/'; // Ensure path points to the correct location
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 774, true); // Create directory if it doesn't exist
            }

            $target_file = $target_dir . basename($_FILES["food_image"]["name"]);
            if (is_writable($target_dir)) {
                if (move_uploaded_file($_FILES["food_image"]["tmp_name"], $target_file)) {
                    $food_image = "../images/" . basename($_FILES["food_image"]["name"]);
                    $conn->query("UPDATE menu SET food_name='$food_name', food_image='$food_image'
                    , food_description='$food_description',
                     price='$price', category='$category', allergens='$allergens' WHERE id=$id");
                    echo "File uploaded and record updated successfully!";
                } else {
                  echo "Failed to move uploaded file. Please check file permissions.";
                }
            } else {
                echo "Target directory is not writable. Please update permissions.";
            }
        } else {
            $conn->query("UPDATE menu SET food_name='$food_name', food_description='$food_description', price='$price', category='$category', allergens='$allergens' WHERE id=$id");
        }
    }
}
$menu_items = $conn->query("SELECT * FROM menu");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Durbar Restaurant Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
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
        table img {
            max-width: 100px;
            height: auto;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .actions button:hover {
            background-color: #0056b3;
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
</head>
<body>
    <h1>Durbar Restaurant Admin Panel</h1>

    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="">
        <label for="food_name">Food Name:</label>
        <input type="text" id="food_name" name="food_name" required><br>
        <label for="food_image">Food Image:</label>
        <input type="file" id="food_image" name="food_image" required><br>
        <label for="food_description">Food Description:</label>
        <input type="text" id="food_description" name="food_description" required><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br>
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="Soups">Soups</option>
            <option value="Appetizers">Appetizers</option>
            <option value="Tandoori Oven">Tandoori Oven</option>
            <option value="Drinks">Drinks</option>
            <option value="Lunch">Lunch</option>
            <option value="Breakfast">Breakfast</option>
        </select><br>
        <label for="allergens">Allergens:</label>
        <input type="text" id="allergens" name="allergens"><br>
        <button type="submit" name="add">Add Food</button>
        <button type="submit" name="update">Update Food</button>
        <button type="submit" name="delete">Delete Food</button>
    </form>

    <h2>Menu Items</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Food Name</th>
                <th>Food Image</th>
                <th>Food Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Allergens</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $menu_items->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['food_name']; ?></td>
                    <td><img src="<?php echo $row['food_image']; ?>" alt="<?php echo $row['food_name']; ?>"></td>
                    <td><?php echo $row['food_description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['allergens']; ?></td>
                    <td class="actions">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="food_name" value="<?php echo $row['food_name']; ?>">
                            <input type="hidden" name="food_image" value="<?php echo $row['food_image']; ?>">
                            <input type="hidden" name="food_description" value="<?php echo $row['food_description']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
                            <input type="hidden" name="allergens" value="<?php echo $row['allergens']; ?>">
                            <button type="submit" name="update">Update</button>
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>