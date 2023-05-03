<?php 
include "conn.php";
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tblDriver WHERE dID = '$id'");
header("Location: registereddriver.php");
?>