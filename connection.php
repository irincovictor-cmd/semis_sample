<?php 
    session_start();
    $connection = new mysqli("localhost","root","","php1");
    if ($connection->connect_error) {
        die("Connection Failed". $connection->connect_error);
    }
?>