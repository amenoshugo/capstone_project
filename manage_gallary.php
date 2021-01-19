<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['access'] != 'admin'){
        header("Location: index.html");
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/photoshoot.css">
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
            <h3>Add to Gallery</h3><br><br>
            <form action="" method="POST" enctype="multipart/form-data">
                
                <input type="file" name="file">
                <label for=""></label><br><br>
                <input type="submit" name="upload" value="Submit">
            </form>
            <br>
            <br>
            <br><hr>
            <br><br>
            <h1 style="text-align: center;">Gallery</h1>
            <div class="gallery">
                <img src="img/gallery/img1.jpg" alt="">
                <img src="img/gallery/img2.jpg" alt="">
                <img src="img/gallery/img3.jpg" alt="">
                <img src="img/gallery/img4.jpg" alt="">
            </div>
        </div>
    </div>
    
    

</body>
</html>