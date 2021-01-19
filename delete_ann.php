<?php
    include_once("connect.php");
    $c = connection();

    $id = $_GET['ID'];

    echo $id;

    $sql = "DELETE FROM `announcements` WHERE `announcements`.`a_id` = $id";
    $result = $c->query($sql) or die($c->connect_error);

    echo header("Location: manage_announcement.php");
?>