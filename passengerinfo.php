<?php 
include "conn.php";
$id = $_GET['user'];
$query = mysqli_query($conn, "SELECT dConfirm FROM tblDriver WHERE uID = '$id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <title>CAR POOLING</title>
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
<?php
    include "nav.php";
?>   
    <?php
    //pag may isang nakaregister na kotse
    if (mysqli_num_rows($query) === 1){

    while ($result = $query->fetch_array()) { 

    if ($result['dConfirm']=='1'){
    echo "<h1>YOU ARE NOW REGISTERED AS A DRIVER. PLEASE LOG OUT.</h1>";    
    }else {
        echo "<h1>YOUR DRIVER REGISTRATION IS STILL IN PROCESS.</h1>";
    }
    }

    }else {
        echo "<h1>YOU NEED TO REGISTER YOUR CAR TO BE A DRIVER.</h1>";
    }  
?>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>