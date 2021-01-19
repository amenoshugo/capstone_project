<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['access'] != 'parishioner'){
        header("Location: index.html");
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
            <a href="add_reservation.php?ID=">Add Reservation</a><br><br>
            <a href="myreservation.php">My Reservation</a><br><br>
            <a href="editprofile.php">Edit Profile</a>
        </div>
        <div class="rc">
              
        </div>
    </div>
    
    

</body>
</html>