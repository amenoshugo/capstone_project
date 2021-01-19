<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!empty($_SESSION['username'])){
        echo header("Location: index.php");
    }

    include_once("connect.php");
    $c = connection();

    if(isset($_POST['register'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];
        $email = $_POST['email'];
        $sql = "INSERT INTO `user` (`username`, `first_name`, `last_name`, `email`, `password`) VALUES ('$username', '$firstname', '$lastname', '$email', '$password');";
        $result = $c->query($sql) or die($c->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <h1>You have successfully registered.</h1>
</body>
</html>