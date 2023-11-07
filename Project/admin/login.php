<?php
require 'function.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: CRUD/index.php"); // Redirect to main page (list museum data)
            exit;
        }
    }
    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-image: url('asset/bg.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
        background-size: cover; /* This ensures the image covers the entire viewport */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 36px;
            color: #FFFFFF; /* Change the text color */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Add a subtle text shadow */
            border-bottom: 2px solid #FFFFFF; 
            padding-bottom: 5px; 
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 2px;
        }

        input[type="text"], input[type="password"] {
            width: 94%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, a {
            font-size: 13px;
            background-color: #4caf50;
            display: inline-block;
            margin: auto;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p.error-message {
            color: red;
            font-style: italic;
            text-align: center;
        }
        img {
            display: block;
            margin:auto;
            height: 150px;
            weight: 300px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }       
        
    </style>

</head>
<body>
    <h1>
        Login Admin
    </h1>

    <?php if (isset($error)): ?>
    <p style="color: black; font-style: italic; text-align: center ">username/password salah pak!</p>
<?php endif; ?>

    <form action="" method="post">

    <ul>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
        <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="login">
                Login
            </buttom>
        </li>
    </ul>

    </form>
    <img src="asset/geo.png">
</body>
</html>