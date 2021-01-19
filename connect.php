<?php
    function connection(){
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'capstone';

        $conn = new mysqli($host,$username,$password,$dbname);

        if($conn->connect_error){die("Connection failed: " . $conn->connect_error);}
        else{return $conn;}
    }
?>