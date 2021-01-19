<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(empty($_SESSION['username'] || $_SESSION['access_level'] != 'admin')){
        echo header("Location: index.php");
    }

    include_once("connect.php");
    $c = connection();

    $sql = "SELECT * FROM announcements ORDER by date_created DESC";
    $result = $c->query($sql) or die($c->connect_error);
    $row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/m-ann.css">
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
            <h3>Manage Announcements</h3> 
            <br> <br> <br>
            
            <?php do{ ?>
                <div class="con">
                    <p><?php echo $row['content']?></p>
                    
                    <a href="edit_ann.php?ID=<?php echo $row['a_id'] ?>"><img src="img/edit.png" style="width:25px; height:25px;"></a>
                    <a href="delete_ann.php?ID=<?php echo $row['a_id'] ?>"><img src="img/remove.png" style="width:25px; height:25px;"></a>
                </div>
                <br><br>
            <?php }while($row = $result->fetch_assoc()) ?>

            <hr><br><br>
            <a href="add_ann.php" class="button">Add Announcement</a>
        </div>
    </div>
    
</body>
</html>