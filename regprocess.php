<!-- <link rel="stylesheet" href="style.css"> -->
<?php
include "conn.php";
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$pass = $_POST["password"];

$v_code = bin2hex(random_bytes(16));

session_start();
$_SESSION['firstname'] = $fname;
$_SESSION['lastname'] = $lname;
$_SESSION['email'] = $email;
$_SESSION['password'] = $pass;
$_SESSION['code'] = $v_code;
$_SESSION['user_type'] = $level;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//checking if user is taken
$sql = "SELECT * FROM tblUser WHERE uEmail = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)==0){
    header("Location: adduser.php");
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                        //Enable verbose debug output
    $mail->isSMTP();                                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                         //Set the SMTP server to send through
    $mail->SMTPAuth   = 'true';                                     //Enable SMTP authentication
    $mail->Username   = 'emailsenderphpmail@gmail.com';                     //SMTP username - fuerteramonchristopher@gmail.com
    $mail->Password   = 'htxtpswbmujuzgrk';                       //SMTP password - biehdlavioyicybc
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;              //Enable implicit TLS encryption
    $mail->Port       = '465';                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('1510cyan@gmail.com', 'User Registration');
    $mail->addAddress($email, $fname);    //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Your verify code";
    $mail->Body    = "<h2><b> Carpool App </b></h2> <br> <p>Dear $fname, </p> <br> <h3>Good day, you only have one step to use the app. 
    Click the link below to finalize the Carpool App Registration<br></h3>
    <p><a href='http://localhost/carpool/confirmacc.php?email=$email&v_code=$v_code'>Verifying Email Address</a></p> 
    <br><br>
    <p>With regards,</p>
    <b>Carpooling App</p>";

    $mail->send();
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}else {?>
    <script>
        window.alert('Credentials Already Taken!');
        window.location.href='register.php';
    </script>
<?php
}

//https://bryy.tech/
?>