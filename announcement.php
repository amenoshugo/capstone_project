<?php
    include_once("connect.php");
    $c = connection();

    $sql = "SELECT * FROM `announcements` ORDER by date_created DESC
    ";
    $result = $c->query($sql) or die($c->connect_error);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ann.css">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <br><br>
    <div class="form">
        <h1 style="text-align: center;">Announcements</h1>
        <br><br>
        <?php do{ ?>
            <div class="a-form">
                <h6 style="color: gray;"><?php echo $row['date_created']; ?></h3>
                <h3><?php echo $row['content']; ?></h3>
                <br><hr><br>
            </div>
            
        <?php }while($row = $result->fetch_assoc()) ?>
    </div>
    

</body>
</html>