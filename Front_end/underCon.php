<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        h1 {
            font-size: 3em;
            color: #ff6f00;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 20px;
        }
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #ff6f00;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
<?php include_once 'header.php' ?>
    <div class="container">
        <h1>Coming Soon!</h1>
        <p>We're currently working on this feature, and it will be available soon. Stay tuned!</p>
        <div class="loader"></div>
    </div>
</body>
</html>
