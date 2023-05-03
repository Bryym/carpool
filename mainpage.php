<?php 
$id = $_GET['user'];

include "conn.php";

$sql = "SELECT * FROM tblUser WHERE uID='$id'";
$query = $conn->query($sql);
$row = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <title>CAR POOLING</title>
        <style>
            p,
            h1,
            h2,
            h3,
            h4 {
                color: white;
                text-align: center;
            }

            .button a{
                text-align: center;
            }

            .button{
                margin-top: 130px;
            }

            .button button{
                width: 300px;
                height: 100px;
                font-size: 21px;
            }


        </style>
    </head>

<body>
    <?php
    include "nav.php";
    ?>
    
    <div class="button">
    <?php echo "<h2> Welcome! ". $row['uFirstName']. " ". $row['uLastName']. "!</h2><br>";?>
        <center>
    <a href="driverreg.php?user=<?php echo $id?>"><button class="btn btn-secondary">Register as Driver</button></a><br><br>
    <a href="passengerinfo.php?user=<?php echo $id?>"><button class="btn btn-secondary">Registration Info</button> </a><br><br>     
    <a href="editinfo.php?user=<?php echo $id?>"><button class="btn btn-secondary">Edit Profile</button> </a>           
        </center>
         
    </div>
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>