<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = mysqli_real_escape_string($connection, $_POST['new_account_username_input']);
    $password = password_hash($_POST['new_account_passsword_input'], PASSWORD_DEFAULT);
    $user_type = "user";

    $checkUsername = mysqli_query($connection,"SELECT * FROM users WHERE username = '$username'");
    
    if(mysqli_num_rows($checkUsername) > 0) {
        echo "<script>alert('Username already exists!');</script>";
        echo "<script>window.location.href='../index.php';</script>";
    } else {

        $sql = "INSERT INTO users(username, password, user_type) 
                VALUES ('$username', '$password', '$user_type')";
                          
        if(mysqli_query($connection, $sql)) {
            echo "<script>alert('User added successfully!');</script>";
            echo "<script>window.location.href='../index.php';</script>";//point to login form
        } else {
            echo "<script>alert('Error adding user!');</script>";
            echo "<script>window.location.href='../index.php';</script>";//point to login form
        }
    }
}
?>