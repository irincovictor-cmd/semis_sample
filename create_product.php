<?php


include "connection.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


   $product_name = $_POST['name'] ?? "";
   $product_stocks = $_POST['stock'] ?? "";
   $date_of_delivery = $_POST['date_delivery'] ?? "";
   $product_status = $_POST['status'] ?? "";




   $checkProductIfExist = mysqli_query($connection,"SELECT * FROM products WHERE product_name = '$product_name'");
  
   if(mysqli_num_rows($checkProductIfExist) > 0) {
       echo "<script>alert('Product name already exists!');</script>";
       echo "<script>window.location.href='dashboard.php';</script>";
   } else {


       $sql = "INSERT INTO products(product_name, product_stocks, date_of_delivery, product_status)
               VALUES ('$product_name', '$product_stocks', '$date_of_delivery', '$product_status')";
                        
       if(mysqli_query($connection, $sql)) {
           echo "<script>alert('Product added successfully!');</script>";
           echo "<script>window.location.href='dashboard.php';</script>";
       } else {
           echo "<script>alert('Error adding of product!');</script>";
           echo "<script>window.location.href='dashboard.php';</script>";
       }
   }
}




?>