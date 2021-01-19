<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <div class="home">
        <img src="img/logo1.png" alt="" class="logo">
        <h1>Parish of Sto. Cristo and Saint Andrew Kim Tae-gon</h1>
    </div>

    <footer>
        <p class="copy">Copyright</p>
    </footer>
</body>
</html>