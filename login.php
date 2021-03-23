<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="text-align: center">
    <h1>Login</h1>
    <?php include('errors.php') ?>
    <form action="login.php" method="post">
        <label>Email:</label>
        <input type="email" name="email" />
        <br /><br />
        <label>Password:</label>
        <input type="password" name="password" />
        <br /><br />
        <button type="submit" name="login_user">Login</button>
    </form>
    <p>
        <b>Don't have an account?</b>
        <a href="register.php">Register</a>
    </p>
</body>
</html>