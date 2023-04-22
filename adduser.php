<?php 
session_start();
$fname = $_SESSION['first'];
$lname = $_SESSION['last'];
$email = $_SESSION['email'];
$pass = $_SESSION['passw'];
$v_code = $_SESSION['code'];
$level = $_SESSION['user_level'];

if ($_SESSION['user_type'] == "Passenger") {
    $level = '1';
} else if ($_SESSION['user_type'] == "Driver") {
    $level = '2';
}

include "conn.php";
mysqli_query($conn, "INSERT INTO tblUser (uFirstName, uLastName, uEmail, uPass, uVerification_code, uLevel) VALUES ('$fname', '$lname', '$email', '$pass', '$v_code', '$level')");
$conn->close();
header("Location: check.php");
?>