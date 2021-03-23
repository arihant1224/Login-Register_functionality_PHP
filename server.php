<?php

session_start();

$username = "";
$email = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'tesmo_db');

//Register User

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if (empty($username)){
        array_push($errors, "Username is required!");
    }
    if (empty($email)){
        array_push($errors, "Email is required!");
    }
    if (empty($password_1)){
        array_push($errors, "Password is required!");
    }
    if (empty($password_2)){
        array_push($errors, "Confirm Password is required!");
    }

    if ($password_1 != $password_2){
        array_push($errors, "Two passwords do not match!");
    }

    $user_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($db, $user_query);
    $user = mysqli_fetch_assoc($result);

    if ($user){
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists!");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists!");
        }
    }

    if (count($errors) == 0){
        $password = md5($password_1);
        $reg_query = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $reg_query);
        $_SESSION['success'] = "You are now logged in!";
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        header("location: home.php");
    }
}

//Login User

if (isset($_POST['login_user'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)){
        array_push($errors, "Email is required!");
    }
    if (empty($password)){
        array_push($errors, "Password is required!");
    }

    $password = md5($password);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $results = mysqli_query($db, $login_query);
    $users = mysqli_fetch_assoc($results);

    if (mysqli_num_rows($results) == 1){
        $_SESSION['success'] = "You are now logged in!";
        $_SESSION['username'] = $users['username'];
        $_SESSION['email'] = $users['email'];
        header("location: home.php");
    }else {
        array_push($errors, "Email/Password combination do not match!");
    }
}

?>