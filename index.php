<?php

// Start Session
session_start();

// Database connection
require "conn.php";
$db = conn();

// Application library ( with DemoLib class )
require __DIR__ . '/lib/library.php';
$app = new DemoLib();

$login_error_message = '';
$register_error_message = '';

//Check Login request
if (!empty($_POST['btnLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "") {
        $login_error_message = 'Username field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            $_SESSION['user_id'] = $user_id; // Set Session
            header("Location: profile.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }
    }
}

//Check Register request
if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Name field is required!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email field is required!';
    } else if ($_POST['username'] == "") {
        $register_error_message = 'Username field is required!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field is required!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Invalid email address!';
    } else if ($app->isEmail($_POST['email'])) {
        $register_error_message = 'Email is already in use!';
    } else if ($app->isUsername($_POST['username'])) {
        $register_error_message = 'Username is already in use!';
    } else {
        $user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password']);
        // set session and redirect user to the profile page
        $_SESSION['user_id'] = $user_id;
        header("Location: profile.php");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

<div>
    <div>
        <div>
            <h4>Register</h4>
            <?php
            if ($register_error_message != "") {
                echo '<div><strong>Error: </strong> ' . $register_error_message . '</div>';
            }
            ?>
            <form action="index.php" method="post">
                <div>
                    <label for="">Name</label>
                    <input type="text" name="name"/>
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email"/>
                </div>
                <div>
                    <label for="">Username</label>
                    <input type="text" name="username"/>
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password"/>
                </div>
                <div>
                    <input type="submit" name="btnRegister" value="Register"/>
                </div>
            </form>
        </div>
        <div>
            <h4>Login</h4>
            <?php
            if ($login_error_message != "") {
                echo '<div><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
            <form action="index.php" method="post">
                <div>
                    <label for="">Username/Email</label>
                    <input type="text" name="username"/>
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password"/>
                </div>
                <div>
                    <input type="submit" name="btnLogin" value="Login"/>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>