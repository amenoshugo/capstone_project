<?php
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['access']);

    echo header("Location: index.php");
?>