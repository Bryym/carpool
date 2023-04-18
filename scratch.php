<?php
include "conn.php";
session_start();
$email = $_GET['email'];
$v_code = $_GET['v_code'];

$sql = "UPDATE tblUser SET uStatus = '1' WHERE uEmail = '$email' AND uVerification_code = '$v_code'";
mysqli_query($conn, $sql);
header("Location: registeredusers.php");

