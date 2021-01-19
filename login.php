<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!empty($_SESSION['username'])){
        echo header("Location: index.php");
    }
    
    include_once("connect.php");
    $c = connection();
    $s_message="";
    $errs="";
    if(!empty($_GET['success']) && $_GET['success'] == 'yes'){
        $s_message="Successfully registered"."<br>"."The link for the activation is sent to your email";
    }else if(!empty($_GET['success']) && $_GET['success'] == 'yes2'){
        $s_message="Your password has been successfully changed";
    }
    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user where username ='$username' and password='$password';";
        $result = $c->query($sql) or die($c->connect_error);
        $row = $result->fetch_assoc();
        $total = $result->num_rows;
        
        if($total > 0){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['access'] = $row['access_level']; 
            $_SESSION['fname'] = $row['first_name'];
            $_SESSION['ID'] = $row['user_id'];
           
            echo header("Location: index.php");
        }else{
            $errs='Login failed';
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <title>Document</title>
    </head>

    <body>
    <?php include_once("header.php"); ?>
        <br>
        <div class="logform">
            <p class="mes"><?php echo $s_message?></p>
            <h1>Login Form</h1>
            
            <form action="" method="POST">
                <div class="form-element">
                    <label style="display: block;">Username</label>
                    <input type="text" name="username" required>
                </div>

           

                <div class="form-element">
                    <label style="display: block;">Password</label>
                    <input type="password" name="password" required>
                </div>
                
                

                <input type="submit" value="Login" name="login" class="button">

                <p style="text-align: center; color:red"><?php echo '<br>'.$errs ?></p>
            </form>
            <br><br>
            <p>Not yet a member? <a href="register.php">Sign Up Here!</a></p>
            <br>
            <p><a href="forgotpassword.php">Forgot password</a></p>
        </div>
    </body>
</html>