<?php
    include_once("connect.php");
    $c = connection();

    $id = $_GET['ID'];

    $sql = "SELECT * FROM `announcements`";
    $result = $c->query($sql) or die($c->connect_error);
    $row = $result->fetch_assoc();

    if(isset($_POST['edit-user'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $act = $_POST['acc-type'];
        $sql = "UPDATE `user` SET `username` = '$username', `first_name` = '$firstname', `last_name` = '$lastname', `email` = '$email', `password` = '$password', `access_level` = '$act' WHERE `user`.`user_id` = $id;";
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
    <title>Document</title>
</head>
<body>
<?php include_once("header.php"); ?>
<br>
    <div class="mc">
        <div class="lc">
            <a href="manage_account.php">Manage Account</a><br><br>
            <a href="manage_reservation.php">Manage Reservation</a><br><br>
            <a href="manage_gallary.php">Manage Gallery</a><br><br>
            <a href="manage_announcement.php">Manage Announcement</a><br><br>
            <a href="generate_report.php">Generate Report</a>
        </div>
        <div class="rc">
            <h3>Edit Announcement Form</h3><br>
            <form action="" method="POST">
                <label for="">Announcement</label><br><br>
                <textarea name="content" id="" cols="60" rows="10" value=<?php echo $row['content'] ?>></textarea>
                <br>
                <input type="submit" name="add-ann" value="Submit">
            </form>   
        </div>
    </div>
</body>
</html>