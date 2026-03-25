<?php

session_start();
if (!isset($_SESSION["user_id"])) {  
    header("Location: index.php");  
}
$current_user = $_SESSION["username"];
$current_user_type = $_SESSION["user_type"];
?>