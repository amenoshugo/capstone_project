<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['access'] != 'admin'){
        header("Location: index.html");
    }
    include_once("connect.php");
    $c = connection();

    if(isset($_POST['add-ann'])){
        $content = $_POST['content'];
        $sql = "INSERT INTO `announcements` (`content`, `user_id`) VALUES ('$content', '1');";
        $result = $c->query($sql) or die($c->connect_error);

        echo header("Location: manage_announcement.php");
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
            <h3>Add Announcement Form</h3><br><br>
            <form action="" method="POST">
                <label for="">Announcement</label><br><br>
                <textarea name="content" id="" cols="60" rows="10"></textarea>
                <br>
                <input type="submit" name="add-ann" value="Submit">
            </form>
        </div>
    </div>
    
    

</body>
</html>