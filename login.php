<?php

    $conn = mysqli_connect("localhost", "root", "", "optiman") or die("Connection failed");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>
    <form action="" method="post" onsubmit="return false;"></form>
    <label for="name">Username</label>
    <input type="text" name="name">
    <label for="password">Username</label>
    <input type="text" name="password">

    <input type="submit" value="submit">
    <label for=""><a href="signup.php">Create Account?</a></label>
</body>
</html>