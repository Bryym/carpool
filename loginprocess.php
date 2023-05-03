<?php
include "conn.php";

$email = $_POST ['email'];
$pass = $_POST ['password'];
    
$sql = "SELECT * FROM tblUser WHERE uEmail = '$email' AND uPass = '$pass' AND uStatus = '1'";
$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        $id = $row['uID'];
        $_SESSION['Email'] = $row['uEmail'];
        $_SESSION['Password'] = $row['uPass'];

        if ($row ['uEmail'] === $email && $row ['uPass'] === $pass ){
            if ($row ['uLevel'] == 1){
                header("Location: mainpage.php?user=".$id);
            } else if ($row ['uLevel'] == 2){
                header("Location: driverpage.php?user=".$id);
            }else if ($row ['uLevel'] == 3){
                header("Location: registereddriver.php?user=".$id);
            }
        }

    }else {?>
    
        <script>
        window.alert('User not Found!');
        window.location.href='index.php';
        unset($_SESSION['Email']);
        unset($_SESSION['Password']);
        </script>
   <?php }?>