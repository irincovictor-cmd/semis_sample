<?php //opening tag of PHP
session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        session_unset();
        unset($_SESSION['resulta']);
        
        echo "<script> window.location.href='index.php';</script>";
    }

?>
