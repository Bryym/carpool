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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        h1{
            text-align: center;
            padding-top: 300px;
            color: white;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>CHECK YOUR EMAIL ADDRESS.</h1>
</body>
</html>