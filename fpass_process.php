<?php
    if(!isset($_SESSION)){
        session_start();
    }

    include_once("connect.php");
    $c = connection();
    $id = $_GET['ID'];
    $errs="";

    $sql = "SELECT * FROM user where user_id ='$id'";
    $result = $c->query($sql) or die($c->connect_error);
    $row = $result->fetch_assoc();

    if(isset($_POST['f_process'])){
        $pass = $_POST['pass'];
        $sql = "UPDATE `user` SET `password` = '$pass' WHERE `user`.`user_id` = $id;";
        $result = $c->query($sql) or die($c->connect_error);
        
        echo header("Location: login.php?success=yes2");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/home.css">

    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <div class="logform">
        <h3>Forgot Password</h3><br>
        <form action="" method="post">
            <div class="form-element">
                <label for="">New Password</label><br><br>
                <input type="password" name="pass" placeholder="Enter your new password here"><br><br><br><br><br>
            </div>
            <input type="submit" value="Submit" name="f_process">
            <p style="text-align: center; color:red"><?php echo "<br><br>".$errs?></p>
        </form>
    </div>
</body>
</html>