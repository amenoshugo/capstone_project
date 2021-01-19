<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

    if(!isset($_SESSION)){
        session_start();
    }

    if(!empty($_SESSION['username'])){
        echo header("Location: index.php");
    }
    $no_error = 0;
    $user_err = '';
    $pass_err = '';
    $email_err = '';

    include_once("connect.php");
    $c = connection();

    require 'vendor/autoload.php';


    if(isset($_POST['register'])){

        $username = $_POST['username'];
        $sql = "SELECT * FROM user where username ='$username'";
        $result = $c->query($sql) or die($c->connect_error);
        $row = $result->fetch_assoc();
        $total = $result->num_rows;

        if($total >0){
            $user_err = "Username already exist";
            $no_error += 1;
        }

        $email = $_POST['email'];
        $sql = "SELECT * FROM user where email ='$email'";
        $result = $c->query($sql) or die($c->connect_error);
        $row = $result->fetch_assoc();
        $total = $result->num_rows;

        if($total >0){
            $email_err = "Email already exist";
            $no_error += 1;
        }
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];

        if($password != $cpassword){
            $pass_err = "Password does not match";
            $no_error += 1;
        }

        if($no_error == 0){
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $username = $_POST['username'];
            $password = $_POST['pass'];
            $cpassword = $_POST['cpass'];
            $email = $_POST['email'];
            $ver_no = rand(100000,999999);
            $sql = "INSERT INTO `user` (`username`, `first_name`, `last_name`, `email`, `password`,`account_status`,`verification_no`,`access_level`) VALUES ('$username', '$firstname', '$lastname', '$email', '$password','Unverified','$ver_no','parishioner');";
            $result = $c->query($sql) or die($c->connect_error);  
            
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'limclarkangelo.pdm@gmail.com';                     // SMTP username
                $mail->Password   = 'YaMaMoTo143';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
                //Recipients
                $mail->setFrom('limclarkangelo.pdm@gmail.com', 'Parish of Sto. Cristo and Saint Andrew Kim Tae-gon');
                $mail->addAddress('shugonoame@gmail.com');     // Add a recipient// Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                // Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Account Registration';
                $mail->Body    = 'Hi '.$firstname.'<br>Thank you for registering! Please click the link below to verify your account.<br>http://localhost/capstone_project/verify.php?='.$ver_no;
                $mail->AltBody = 'Hi '.$firstname.'<br>Thank you for registering! Please click the link below to verify your account.<br>http://localhost/capstone_project/verify.php?='.$ver_no;
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            echo header("Location: login.php?success=yes");

        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <br>
    <div class="regform">
        <h2>Sign Up</h2>
        <form action="" method="post">
            <div class="form-element">
                <label for="">First Name</label>
                <input type="text" name="fname" required> <br> 
            </div>

            <div class="form-element">
                <label for="">Last Name</label>
                <input type="text" name="lname" required>  <br>
            </div>

            <div class="form-element">
                <label for="">Username</label>
                <input type="text" name="username" required> <br>
                <?php if(!empty($user_err)){?> 
                    <p style="color: red;"><?php echo "*".$user_err."<br>"; ?></p>
                <?php } ?>
            </div>

            <div class="form-element">
                <label for="">Password</label>
                <input type="password" name="pass" required> <br>
                <?php if(!empty($pass_err)){?> 
                    <p style="color: red;"><?php echo "*".$pass_err."<br>"; ?></p>
                <?php } ?>
            </div>

            <div class="form-element">
                <label for="">Confirm Password</label>
                <input type="password" name="cpass" required> <br> 
            </div>

            <div class="form-element">
                <label for="">Email</label>
                <input type="email" name="email" required> <br> 
                <?php if(!empty($email_err)){?> 
                    <p style="color: red;"><?php echo "*".$email_err."<br>"; ?></p>
                <?php } ?>
            </div>

            <input type="submit" name="register" value="Submit" class="button">
        </form>
        <p>Already have an account? <a href="login.php">Login Here!</a></p>
    </div>
    
    
</body>
</html>