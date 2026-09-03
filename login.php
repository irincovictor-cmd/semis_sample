<?php
include "connection.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


   $username = trim($_POST['user'] ?? "");
   $password = trim($_POST['pass'] ?? "");


    $stmt = $connection->prepare("SELECT id, password, user_type FROM users WHERE username = ?");
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $stmt->store_result();


   if ($stmt->num_rows > 0) {
       $stmt->bind_result($id, $hashedPassword, $user_type);
       $stmt->fetch();


   
       if (password_verify($password, $hashedPassword)) {
           $_SESSION["user_id"] = $id;
           $_SESSION["username"] = $username;
           $_SESSION["user_type"] = $user_type;
           header("Location: dashboard.php");
           exit();
       } else {
            echo "<script>alert('Incorrect credentials');</script>";
            echo "<script>window.location.href='index.php';</script>";
       }
   } else {
        echo "<script>alert('Incorrect credentials');</script>";
        echo "<script>window.location.href='index.php';</script>";
   }




   $stmt->close();
}
?>