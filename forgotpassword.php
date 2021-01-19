<?php
    if(!isset($_SESSION)){
        session_start();
    }

    include_once("connect.php");
    $c = connection();
    $errs="";
    if(isset($_POST['f_submit'])){
        $email = $_POST['email'];
        $sql = "SELECT * FROM user where email ='$email'";
        $result = $c->query($sql) or die($c->connect_error);
        $row = $result->fetch_assoc();
        $total = $result -> num_rows;
        
        if($total > 0){
            echo header("Location: fpass_process.php?ID=".$row['user_id']);
        }else{
            $errs='No user found';
        }
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
                <label for="">Email</label><br><br>
                <input type="email" name="email" placeholder="Enter your email here" required><br><br><br><br><br>
            </div>
            <input type="submit" value="Submit" name="f_submit">
            <p style="text-align: center; color:red"><?php echo "<br><br>".$errs?></p>
        </form>
    </div>
</body>
</html>