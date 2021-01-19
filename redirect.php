<?php
     if(!isset($_SESSION)){
        session_start();
    }

    if(empty($_SESSION['username'])){
        echo header("Location: index.php");
    }

    if($_SESSION['access'] == 'priest'){
        header("Location: priest.php");
    }
    if($_SESSION['access'] == 'admin'){
        header("Location: admin.php");
    }
    if($_SESSION['access'] == 'staff'){
        header("Location: staff.php");
    }
    if($_SESSION['access'] == 'parishioner'){
        header("Location: parish.php");
    }


    echo $_SESSION['access'];
?>

