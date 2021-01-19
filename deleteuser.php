<?php
    include_once("connect.php");
    $c = connection();

    $id = $_GET['ID'];

    echo $id;

    $sql = "DELETE FROM `user` WHERE `user`.`user_id` = $id";
    $result = $c->query($sql) or die($c->connect_error);

    echo header("Location: manage_account.php");
?>