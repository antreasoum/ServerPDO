<?php

session_start();

//Check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

//Database connection
require "conn.php";
$db = conn();

//Application library (with DemoLib class)
require __DIR__ . '/lib/library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <div>
        <div>
            <h2>
                Profile
            </h2>
            <h3>Hello <?php echo $user->name ?>,</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur deserunt dolore fuga labore magni maxime, quaerat reiciendis tenetur? Accusantium blanditiis doloribus earum error inventore laudantium nesciunt quis reprehenderit ullam vel?
            </p>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>