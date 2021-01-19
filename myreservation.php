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
    $sql = "SELECT * from reservation where `user_id`='$id'";
    $result = $c->query($sql) or die($c->connect_error);
    $row = $result->fetch_assoc();
    $total = $result->num_rows;

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/m-acc.css">
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
            <h3>Lists of Reservations</h3> 
            <br> <br> <br>
            <table>
                <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
                <?php if($total > 0) { do{ ?>
                    <tr>
                            <td><?php 
                                $e_id = $row['event_id'];
                                $sql = "SELECT * from events where `event_id`='$e_id'";
                                $res = $c->query($sql) or die($c->connect_error);
                                $err = $res->fetch_assoc();
                                echo $err['event_name'];       
                            ?></td>
                            <td><?php echo $row['event_date'] ?></td>
                            <td><?php echo $row['event_start_time'].' - '.$row['event_end_time'] ?></td>
                            <td><?php echo $row['reservation_status'] ?></td>
                    </tr>
                    <?php }while($row = $result->fetch_assoc()); } ?>
            </table>
        </div>
    </div>
    
    

</body>
</html>