<?php 
     include_once("connect.php");
     $c = connection();

     $sql = "SELECT * FROM user LIMIT 1000 OFFSET 1";
     $result = $c->query($sql) or die($c->connect_error);
     $row = $result->fetch_assoc();
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
            <a href="manage_announcement.php">Manage Announcement</a><br><br><a href="generate_report.php">Generate Report</a>
        </div>
        <div class="rc">
            <h3>Manage Accounts</h3> 
            <br> <br> <br>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Account Type</th>
                </tr>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['access_level'] ?></td>
                        <td style="display: none;"></td>
                        <td><a href="edituser.php?ID=<?php echo $row['user_id'] ?>"><img src="img/edit.png" style="width:25px; height:25px;"></a></td>
                        <td><a href="deleteuser.php?ID=<?php echo $row['user_id'] ?>"><img src="img/remove.png" style="width:25px; height:25px;"></a></td>
                    </tr>
                <?php }while($row = $result->fetch_assoc()) ?>
                
            </table>
            <br><br>
            <a href="adduser.php" class="button">Add User</a>
          
        </div>
    </div>
    
</body>
</html>