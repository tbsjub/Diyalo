<?php
// Database connection
$conn = new mysqli("localhost", "local_host",
 "", "restaurant");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food_name = $_POST['food_name'];
    $description = $_POST['description'];
    $allergens = $_POST['allergens'];
    $category = $_POST['category'];

    // Handle file upload
    $image_name = $_FILES['food_image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image_name);
    move_uploaded_file($_FILES['food_image']['tmp_name'], $target_file);

    // Insert into database
    $sql = "INSERT INTO menu (food_name, description, allergens, image, category) VALUES ('$food_name', '$description', '$allergens', '$image_name', '$category')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM menu WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td img {
            max-width: 100px;
            height: auto;
        }

        .description {
            max-width: 300px;
            word-wrap: break-word;
        }
    </style>
</head>
<body>

<h2>Food Entry Form</h2>
<form method="POST" enctype="multipart/form-data">
    Food Name: <input type="text" name="food_name" required><br><br>
    Description: <textarea name="description" required></textarea><br><br>
    Allergens: <input type="text" name="allergens"><br><br>
    Category: <select name="category">
        <option value="Starter">Starter</option>
        <option value="Main Course">Main Course</option>
        <option value="Dessert">Dessert</option>
    </select><br><br>
    Food Image: <input type="file" name="food_image" required><br><br>
    <input type="submit" value="Add Food">
</form>

<h2>Food List</h2>
<table border="1">
    <tr>
        <th>Food Name</th>
        <th>Description</th>
        <th>Allergens</th>
        <th>Image</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM menu");
    while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['food_name']; ?></td>
            <td class="description"><?php echo isset($row['description']) ? $row['description'] : 'N/A'; ?></td>
            <td><?php echo isset($row['allergens']) ? $row['allergens'] : 'N/A'; ?></td>
            <td><img src="images/<?php echo $row['image']; ?>" width="100"></td>
            <td><?php echo $row['category']; ?></td>
            <td>
                <a href="update_page.php?id=<?php echo $row['id']; ?>">Update</a>
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
