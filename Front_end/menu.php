<?php
include '../db_config.php';
$menu_items = $conn->query("SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="icon" href=
"..//images/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6E6FA; /* Lavender */
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        header {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background color */
            padding: 20px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .sidebar {
            width: 200px; /* Fixed width for the sidebar */
            height: 100%; /* Full height */
            position: fixed; /* Fixed position */
            top: 0;
            left: 0;
            z-index: 1000;
            background-image: url('..//images/cat3.jpeg'); /* Add background image */
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px;
            overflow-y: auto; /* Scrollable if content overflows */
            margin-top: 70px;
        }

        .sidebar h2 {
            margin-top: 0;
            text-align: center; /* Center the category title */
        }

        .category-list {
            max-height: calc(100% - 60px); /* Adjust height to fit within the sidebar */
            overflow-y: auto; /* Scrollbar for the category list */
            scrollbar-width: thin; /* Firefox */
            scrollbar-color: #4B0082 #E6E6FA; /* Firefox */
        }

        .category-list::-webkit-scrollbar {
            width: 8px; /* Width of the scrollbar */
        }

        .category-list::-webkit-scrollbar-track {
            background: #E6E6FA; /* Background of the scrollbar track */
        }

        .category-list::-webkit-scrollbar-thumb {
            background-color: #4B0082; /* Color of the scrollbar thumb */
            border-radius: 10px; /* Roundness of the scrollbar thumb */
            border: 2px solid #E6E6FA; /* Border around the scrollbar thumb */
        }

        .category-btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #E6E6FA; /* Lavender */
            color: #4B0082; /* Indigo */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: left;
            transition: transform 0.3s ease; /* Add transition for animation */
            direction: ltr; /* Ensure text direction is left-to-right */
        }

        .category-btn:hover {
            background-color: #4B0082; /* Indigo */
            color: white;
            transform: scale(1.05); /* Scale up on hover */
        }

        .menu-container {
            margin-top: 5px;
            margin-left: 200px; /* Adjust margin to account for sidebar width */
            width: calc(100% - 220px); /* Adjust width to account for sidebar width */
            padding: 20px;
            overflow-y: auto;
            margin-top: 70px; /* Add space between header and menu items */
            background-image: url('..//images/menu_bg.jpg'); /* Add background image */
            background-size: cover; /* Ensure the image covers the entire container */
            background-position: center; /* Center the background image */
        }

        .menu-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .menu-item {
            margin-top: 10px;
            background-color: white; /* Background color */
            color: black;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(50% - 20px); /* Two items per row */
            display: flex;
            align-items: center;
            border: 1px solid;
            animation: rainbowBorder 3s infinite;
            background-size: cover; /* Ensure the image covers the entire container */
            background-position: center; /* Center the background image */
            position: relative; /* Position relative for overlapping */
        }

        @keyframes rainbowBorder {
            0% {
                border-color: red;
                border-top-color: red;
                border-right-color: transparent;
                border-bottom-color: transparent;
                border-left-color: transparent;
            }
            25% {
                border-color: orange;
                border-top-color: transparent;
                border-right-color: orange;
                border-bottom-color: transparent;
                border-left-color: transparent;
            }
            50% {
                border-color: yellow;
                border-top-color: transparent;
                border-right-color: transparent;
                border-bottom-color: yellow;
                border-left-color: transparent;
            }
            75% {
                border-color: green;
                border-top-color: transparent;
                border-right-color: transparent;
                border-bottom-color: transparent;
                border-left-color: green;
            }
            100% {
                border-color: red;
                border-top-color: red;
                border-right-color: transparent;
                border-bottom-color: transparent;
                border-left-color: transparent;
            }
        }

        .menu-item img {
            width: 100px; /* Set a smaller width for the image */
            height: auto;
            border-radius: 10px;
            margin-right: 20px; /* Add space between image and text */
            aspect-ratio: 4/3; /* Maintain aspect ratio for the image */
        }

        .menu-item-details {
            text-align: left;
            background-color: transparent; /* Add a semi-transparent background for text readability */
            padding: 10px;
            border-radius: 10px;
            width: 100%;
        }

        .menu-item h2 {
            font-size: 24px;
            margin: 0 0 10px;
        }

        .menu-item p {
            font-size: 16px;
            margin: 0 0 10px;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Limit to 3 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .menu-item .price {
            font-size: 20px;
            color: green; /* Gold */
            font-weight: bold;
            margin-top: 10px;
        }

        .category-title {
            margin-bottom: 20px; 
            margin-top: 20px;/* Add space between category title and items */
            text-align: center;
            color: yellow;
        }

        .category-description {
            margin-bottom: 20px;
            text-align: center;
            color: white;
        }

        .see-more {
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .menu-item {
                width: calc(100% - 20px); /* One item per row on smaller screens */
                flex-direction: column; /* Stack image and text vertically */
            }

            .menu-item img {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .sidebar {
                width: 150px; /* Smaller width on smaller screens */
                padding: 10px;
            }

            .menu-container {
                margin-left: 170px; /* Adjust margin to account for smaller sidebar width */
                width: calc(100% - 170px); /* Adjust width to account for smaller sidebar width */
            }
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <aside class="sidebar">
        <h2>Categories</h2>
        <div class="category-list">
            <button class="category-btn" onclick="filterCategory('Soups')">Soups</button>
            <button class="category-btn" onclick="filterCategory('Appetizers')">Appetizers</button>
            <button class="category-btn" onclick="filterCategory('Tandoori Oven')">Tandoori Oven</button>
            <button class="category-btn" onclick="filterCategory('Drinks')">Drinks</button>
            <button class="category-btn" onclick="filterCategory('Lunch')">Lunch</button>
            <button class="category-btn" onclick="filterCategory('Breakfast')">Breakfast</button>
        </div>
    </aside>
    <main class="menu-container">
        <?php
        $categories = [
            'Soups' => 'Delicious and warm soups to start your meal.',
            'Appetizers' => 'Tasty appetizers to whet your appetite.',
            'Tandoori Oven' => 'Authentic tandoori dishes cooked to perfection.',
            'Drinks' => 'Refreshing drinks to complement your meal.',
            'Lunch' => 'Hearty lunch options to keep you going.',
            'Breakfast' => 'Start your day with our delicious breakfast options.'
        ];

        foreach ($categories as $category => $description) {
            echo "<h2 class='category-title' id='$category'>$category</h2>";
            echo "<p class='category-description'>$description</p>";
            echo '<div class="menu-grid">';
            $menu_items->data_seek(0); // Reset the result pointer to the beginning
            while ($row = $menu_items->fetch_assoc()) {
                if (isset($row['category']) && $row['category'] == $category) {
                    echo '<div class="menu-item" data-id="' . $row['id'] . '" data-name="' . $row['food_name'] . '" data-price="' . $row['price'] . '">';
                    echo '<img src="' . $row['food_image'] . '" alt="' . $row['food_name'] . '">';
                    echo '<div class="menu-item-details">';
                    echo '<h2>' . $row['food_name'] . '</h2>';
                    echo '<p>' . $row['food_description'] . '</p>';
                     echo "Allergens: " . $row['allergens']; 
                    if (strlen($row['food_description']) > 100) {
                        echo '<span class="see-more" onclick="toggleDescription(this)">See more...</span>';
                    }
                    echo '<p class="price">' . $row['price'] . ' CZK</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            echo '</div>';
        }
        
        ?>
    </main>
    

    <script>
        function filterCategory(category) {
            document.getElementById(category).scrollIntoView({ behavior: 'smooth' });
        }

        function toggleDescription(element) {
            const description = element.previousElementSibling;
            if (description.style.display === '-webkit-box') {
                description.style.display = 'block';
                element.textContent = 'See less';
            } else {
                description.style.display = '-webkit-box';
                element.textContent = 'See more...';
            }
        }
    </script>
    <?php include_once 'footer.php'; ?>
<div>
    
</div>
</body>
</html>
