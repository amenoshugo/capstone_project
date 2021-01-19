<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['access'] != 'admin'){
        header("Location: index.html");
    }

    include_once("connect.php");
    $c = connection();

    $id = $_SESSION['ID'];

    $sql1 = "SELECT * from reservation";
    $result = $c->query($sql1) or die($c->connect_error);
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
            <a href="manage_account.php">Manage Account</a><br><br>
            <a href="manage_reservation.php">Manage Reservation</a><br><br>
            <a href="manage_gallary.php">Manage Gallery</a><br><br>
            <a href="manage_announcement.php">Manage Announcement</a><br><br>
            <a href="generate_report.php">Generate Report</a>
        </div>
        <div class="rc">
            <h3>Manage Reservation</h3> 
            <br> <br> <br>

            <table>
                <tr>
                    <th>Event</th>
                    <th>Parishioner</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Mode of Reservation</th>

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
                    <td><?php $u_id = $row['user_id'];
                        $sql = "SELECT * from user where `user_id`='$u_id'";
                        $resu = $c->query($sql) or die($c->connect_error);
                        $fullname = $resu->fetch_assoc();
                        echo $fullname['first_name'].' '.$fullname['last_name'];?></td>
                        <td><?php echo $row['event_date'] ?></td>
                        <td><?php echo $row['event_start_time'].' - '.$row['event_end_time'] ?></td>
                        <td><?php echo $row['reservation_status'] ?></td>
                        <td><?php echo $row['reservation_type'] ?></td>
                        <td><?php if($row['reservation_status'] == 'Pending'){?>
                        <a href="confirm_reservation.php?U=<?php echo $row['user_id']; ?>&R=<?php echo $row['reservation_id']; ?>"><img src="img/confirmation.png" style="width: 20px; height:20px;"></a>
                        <?php }else{ ?>
                            <p>---</p>
                        <?php } ?>
                    </td>
                </tr>
                <?php }while($row = $result->fetch_assoc()); } ?>
            </table>
        </div>
    </div>
</body>
</html>