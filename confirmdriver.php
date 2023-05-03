<?php 
include "conn.php";
$id = $_GET['id'];

mysqli_query($conn, "UPDATE tblDriver LEFT JOIN tblUser ON tblUser.uID=tblDriver.uID SET dConfirm = '1', uLevel = '2' WHERE dID = '$id'");
header("Location: registereddriver.php");
?>