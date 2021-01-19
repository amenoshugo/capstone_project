<?php
    include_once("connect.php");
    $c = connection();

    $sql = "SELECT * FROM `gallery`";
    $result = $c->query($sql) or die($c->connect_error);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/photoshoot.css">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <br><br>
    <h1 style="text-align: center;">Gallery</h1>
    <div class="gallery">
        <img src="img/gallery/img1.jpg" alt="">
        <img src="img/gallery/img2.jpg" alt="">
        <img src="img/gallery/img3.jpg" alt="">
        <img src="img/gallery/img4.jpg" alt="">
    </div>
    

</body>
</html>