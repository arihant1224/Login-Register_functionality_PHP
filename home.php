<?php 

session_start();

if (!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must log in first!";
    header("location: login.php");
}

if (!isset($_SESSION['email'])){
    $_SESSION['msg'] = "You must log in first!";
    header("location: login.php");
}

if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body style="text-align: center">
    <h1>Welcome</h1>
    <h2>
        <?php
        if(isset($_SESSION['success'])) :
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        endif ?>
    </h2>
    <h4>
        Username: 
        <?php
        if(isset($_SESSION['username'])) :
            echo $_SESSION['username'];
        endif ?>
    </h4>
    <h4>
        Email: 
        <?php
        if(isset($_SESSION['email'])) :
            echo $_SESSION['email'];
        endif ?>
    </h4>
    <a href="home.php?logout='1'">Logout</a>
</body>
</html>