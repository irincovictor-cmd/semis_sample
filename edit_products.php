<?php
include "connection.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){


   $id = $_POST['id'];
   $name = $_POST['name'];
   $stock = $_POST['stock'];
   $date = $_POST['date_delivery'];
   $status = $_POST['status'];




   $getProduct = mysqli_query($connection, "SELECT product_name FROM products WHERE id='$id'");
   $row = mysqli_fetch_assoc($getProduct);
   $currentName = $row['product_name'];




   if($name !== $currentName){


       $checkProduct = mysqli_query($connection,
           "SELECT * FROM products WHERE product_name='$name'"
       );


       if(mysqli_num_rows($checkProduct) > 0){
           echo "<script>alert('Product name already exists!');</script>";
           echo "<script>window.location.href='dashboard.php';</script>";
           exit();
       }


   }


   // Update product
   $sql = "UPDATE products
           SET product_name='$name',
               product_stocks='$stock',
               date_of_delivery='$date',
               product_status='$status'
           WHERE id='$id'";


   if(mysqli_query($connection,$sql)){
       header("Location: dashboard.php");
       exit();
   }else{
       echo "Error updating product: " . mysqli_error($connection);
   }


}
?>
