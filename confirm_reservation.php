<?php
    include_once("connect.php");
    $c = connection();

    $u_id = $_GET['U'];
    $r_id = $_GET['R'];

    $sql = "UPDATE `reservation` SET `reservation_status` = 'Confirmed' WHERE `reservation`.`reservation_id` = $r_id AND `reservation`.`user_id` = $u_id";
    $result = $c->query($sql) or die($c->connect_error);

    echo header("Location: manage_reservation.php");
?>