<?php
include "conn.php";

$id = $_GET['user'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];

if (isset($_POST['edit'])){
mysqli_query($conn, "UPDATE tblUser SET uFirstName = '$fname', uLastName = '$lname', uEmail = '$email' WHERE uID = '$id'");
header("Location: mainpage.php?user=". $id);    
}else {
    header("Location: editinfo.php?user=". $id);
}

?>