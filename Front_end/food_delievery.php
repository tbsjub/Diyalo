<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food</title>
    <link rel="icon" href=
    "..//images/Logo.png" type="image/x-icon" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #4c362d;
            font-family: 'Georgia', serif;
            margin-top: 20px;
        }
        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px; /* Adjust gap for spacing */
            margin: 40px auto;
            max-width: 1200px;
            flex-wrap: wrap;
        }
        .card {
            background: white;
            padding: 15px;
            width: 150px; /* Fixed width for consistent card size */
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }
        .card:hover {
           
            transform: translateY(-8px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        .card img {
            width: 90px; /* Small logo size like the reference */
            height: 80px;
            object-fit: contain;
            margin: 5px auto;
            border-radius: 100%; /* Rounded images */
            background-color: #f9f9f9;
        }
        .card img :hover {
            transform: scale(1.1);
        }
        .card h3 {
            font-size: 1rem;
            margin: 10px 0;
            color: #4c362d;
        }
        .card a {
            display: inline-block;
            padding: 8px 15px;
            background:rgb(175, 169, 167);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: background 0.3s;
        }
        .card a:hover {
            background: #ff6347;
        }
        .back-button {
            display: block;
            width: fit-content;
            margin: 30px auto 40px;
            padding: 10px 20px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            text-align: center;
            border-radius: 20px;
            transition: background 0.3s ease;
        }
        .back-button:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <h1>Select a Service</h1>

    <div class="card-container">
        <div class="card">
        <a href="restaurant_link_1">
         <img src="..//images/app1.png" alt="Jídlo na klik"></a>
         </div>
            
            
        <div class="card">
        <a href="restaurant_link_1">
        <img src="..//images/app2.png" alt="Jídlo na klik"></a>

        </div>
        <div class="card">
            <a href="restaurant_link_1">
         <img src="..//images/app3.png" alt="Jídlo na klik"></a>
        </div>
       
    </div>
    <a href="order_options.php" class="back-button">Back to Transportation Method</a>
    <!-- Back button -->
   
</body>
</html>
