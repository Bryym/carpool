<?php
header("Location: index.php");

include "conn.php";
$email = $_GET['email'];
$v_code = $_GET['v_code'];

mysqli_query($conn, "UPDATE tblUser SET uStatus = '1' WHERE uVerification_code='$v_code' AND uEmail='$email'");

?>
