<?php
    session_start();
    include("db_connect.php");


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: sidebar.html");
            exit();
        }
        else {
            echo "Invalid Credentials";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Only</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }
        body {
            background-image: url("login_image.jpg");
            height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
        }
        .container {
            height: auto;
            width: 30%;
            margin: 0 auto;
            background-color: rgba(0,0,0,0.3);
            color: white;
            text-align: center;
            padding: 20px;
            font-family: arial;
            font-weight: bold;
            border: none;
            border-radius: 0.5rem;

        }
        button {
            padding: 10px 15px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
        }
        .container img {
            height: auto;
            width: 70px;
        }
    </style>
</head>
<body>
    <section class="container">
    <a href="home.php"><img src="logo.png" alt="My Coffee Friend logo"></a>
    <h2>Admin Login</h2><br>
    <form method="post">
        <label for="email">Email:</label><br><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label><br><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    </section>

</body>
</html>