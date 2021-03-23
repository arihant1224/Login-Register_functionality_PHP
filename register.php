<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body style="text-align: center">
    <h1>Register</h1>
    <?php include('errors.php') ?>
    <form action="register.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" />
        <br /><br />
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" />
        <br /><br />
        <label>Password:</label>
        <input type="password" name="password_1" />
        <br /><br />
        <label>Confirm Password:</label>
        <input type="password" name="password_2" />
        <br /><br />
        <button type="submit" name="reg_user">Register</button>
    </form>
    <p>
        <b>Already have an account?</b>
        <a href="login.php">Login</a>
    </p>
</body>
</html>