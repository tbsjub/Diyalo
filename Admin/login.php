<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'Gurkharestaurent' && $password == 'Subash@123') {
        $_SESSION['loggedin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left;
        }
        .login-container input {
            width: calc(100% - 40px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding-right: 30px; /* Add space for the eye icon */
        }
        .login-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .login-container .error {
            color: red;
            margin-top: 10px;
        }
        .password-container {
            position: relative;
        }
        .password-container .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <span class="eye-icon" onclick="togglePasswordVisibility()">👁️</span>
            </div>
            <button type="submit">Login</button>
            <?php if (isset($error)): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.querySelector(".eye-icon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.textContent = "🙈";
            } else {
                passwordField.type = "password";
                eyeIcon.textContent = "👁️";
            }
        }
    </script>
</body>
</html>