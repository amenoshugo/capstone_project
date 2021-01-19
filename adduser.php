<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(empty($_SESSION['username'] || $_SESSION['access_level'] != 'admin')){
        echo header("Location: index.php");
    }

    include_once("connect.php");
    $c = connection();

    if(isset($_POST['add-user'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $act = $_POST['acc-type'];
        $sql = "INSERT INTO `user` (`username`, `first_name`, `last_name`, `email`, `password`,`access_level`) VALUES ('$username', '$firstname', '$lastname', '$email', '$password','$act');";
        $result = $c->query($sql) or die($c->connect_error);

        echo header("Location: manage_account.php");
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
            <a href="manage_account.php">Manage Account</a><br><br>
            <a href="manage_reservation.php">Manage Reservation</a><br><br>
            <a href="manage_gallary.php">Manage Gallery</a><br><br>
            <a href="manage_announcement.php">Manage Announcement</a><br><br>
            <a href="generate_report.php">Generate Report</a>
        </div>
        <div class="rc">
            <div class="logform">
                <h3>Add User Form</h3>
                <br><br>
                <form action="" method="POST">
                    <div class="form-element">
                        <label style="display: block;">First Name</label>
                        <input type="text" name="fname" required>
                    </div>

            

                    <div class="form-element">
                        <label style="display: block;">Last Name</label>
                        <input type="text" name="lname" required>
                    </div>

                    <div class="form-element">
                        <label style="display: block;">Username</label>
                        <input type="text" name="username" required>
                    </div>
                
                    <div class="form-element">
                        <label style="display: block;">Password</label>
                        <input type="password" name="pass" required>
                    </div>

                    <div class="form-element">
                        <label style="display: block;">Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-element">
                        <label style="display: block;">Account Type</label>
                        <select id="cars" name="acc-type" style="width: 100%; height:37px; border: 3px solid black">
                            <option value="parishioner">Parishioner</option>
                            <option value="staff" >Staff</option>
                            <option value="priest">Priest</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" value="Submit" name="add-user" class="button">
                </form>
            </div>
        </div>
    </div>
</body>
</html>