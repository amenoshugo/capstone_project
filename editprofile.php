<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['access'] != 'parishioner'){
        header("Location: index.html");
    }

    include_once("connect.php");
    $c = connection();

    $id = $_SESSION['ID'];

    $sql = "SELECT * FROM user where user_id = '$id'";
    $result = $c->query($sql) or die($c->connect_error);
    $row = $result->fetch_assoc();

    if(isset($_POST['edit-user'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $sql = "UPDATE `user` SET `username` = '$username', `first_name` = '$firstname', `last_name` = '$lastname', `email` = '$email', `password` = '$password' WHERE `user`.`user_id` = $id;";
        $result = $c->query($sql) or die($c->connect_error);

        $_SESSION['fname'] = $_POST['fname'];
        echo header("Location: parish.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/adduser.css">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <br><br>
    <div class="mc">
        <div class="lc">
            <a href="add_reservation.php?">Add Reservation</a><br><br>
            <a href="myreservation.php">My Reservation</a><br><br>
            <a href="editprofile.php">Edit Profile</a>
        </div>
        <div class="rc">
            <h2>Edit Profile Form</h2><br>
            <form action="" method="POST">
                <div class="form-element">
                    <label for="">First Name</label>
                    <input type="text" name="fname" value="<?php echo $row['first_name'] ?>"required> <br><br> 
                </div>

                <div class="form-element">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" value="<?php echo $row['last_name'] ?>"required>  <br><br>
                </div>

                <div class="form-element">
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?php echo $row['username'] ?>"required> <br><br> 
                </div>

                <div class="form-element">
                    <label for="">Password</label>
                    <input type="password" name="pass" value="<?php echo $row['password'] ?>"required> <br><br>
                </div>

                <div class="form-element">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $row['email'] ?>"required> <br> <br>
                </div>

                <br>
            <input type="submit" name="edit-user" value="Submit" class="button">
            </form>   
        </div>
    </div>
    
    

</body>
</html>