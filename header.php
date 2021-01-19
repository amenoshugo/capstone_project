<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!empty($_SESSION['username'])){
        $fname = $_SESSION['fname'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>Document</title>
</head>
<body>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="announcement.php">Announcement</a>
        <a href="gallery.php">Gallery</a>
        <?php if(empty($_SESSION['username'])) { ?>
            <a href="register.php">Sign Up</a>
            <a href="login.php">Login</a>
        <?php }else{ ?>
            <a href="redirect.php"><?php echo $fname?></a>
            <a href="logout.php">Logout</a>
       <?php } ?>
    </div>
</body>
</html>
