<?php 
header("Location: check.php");
include "conn.php";
session_start();
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$pass = $_SESSION['password'];
$v_code = $_SESSION['code'];
$level = $_SESSION['user_level'];

mysqli_query($conn, "INSERT INTO tblUser (uFirstName, uLastName, uEmail, uPass, uVerification_code, uLevel) VALUES ('$fname', '$lname', '$email', '$pass', '$v_code', '1')");
$conn->close();
    
