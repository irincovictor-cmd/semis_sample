<?php
include "connection.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){


   $id = $_POST['id'];


   $sql = "DELETE FROM products WHERE id='$id'";


   if(mysqli_query($connection,$sql)){
       header("Location: dashboard.php");
       exit();
   }else{
       echo "Error deleting product: " . mysqli_error($connection);
   }


}
?>
