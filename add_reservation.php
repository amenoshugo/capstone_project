<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['access'] != 'parishioner'){
        header("Location: index.html");
    }

    include_once("connect.php");
    $c = connection();

    $sql1 = "SELECT * from events";
    $result1 = $c->query($sql1) or die($c->connect_error);
    $row1 = $result1->fetch_assoc();

    if(isset($_POST['add-res'])){
        $date = $_POST['date'];
        $s_time = $_POST['start-time'];
        $e_time = $_POST['end-time'];
        $event = $_POST['event-type'];

        $sql = "SELECT * from events where `event_name`='$event'";
        $result = $c->query($sql) or die($c->connect_error);
        $row = $result->fetch_assoc();

        $e_id = $row['event_id'];
        $u_id = $_SESSION['ID'];

        // echo $e_id;
        // echo $_SESSION['ID'];
        $sql = "INSERT INTO `reservation` (`user_id`, `event_id`, `event_date`, `event_start_time`, `event_end_time`, `reservation_status`, `reservation_type`) VALUES ('$u_id', '$e_id', '$date', '$s_time', '$e_time', 'Pending', 'Online')";

        $result = $c->query($sql) or die($c->connect_error);

        echo header("Location: myreservation.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/add-res.css">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <br><br>
    <div class="mc">
        <div class="lc">
            <a href="add_reservation.php">Add Reservation</a><br><br>
            <a href="myreservation.php">My Reservation</a><br><br>
            <a href="editprofile.php">Edit Profile</a>
        </div>
        <div class="rc">
              <h3>Add Reservation Form</h3><br><br>
              <div class="addform">
              <form action="" method="POST">
                <label for="">Date</label><br>
                <input type="date" name="date"><br><br>

                <label for="">Start Time</label><br>
                <input type="time" name="start-time"><br><br>

                <label for="">End Time</label><br>
                <input type="time" name="end-time"><br><br>

                <label for="">Event</label><br>
                <select name="event-type" id="">
                    <?php do{?>
                        <option value="<?php echo $row1['event_name']?>"><?php echo $row1['event_name']?></option>
                    <?php }while($row1=$result1->fetch_assoc())?>
                </select><br><br>

                <input type="submit" value="Submit" name="add-res" class="button"> 


              </form>
              </div>
             

        </div>
    </div>
    
    

</body>
</html>