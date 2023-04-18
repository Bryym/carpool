<link rel="stylesheet" href="style.css">
<?php
include "conn.php";

$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$pass = $_POST["password"];

$v_code = bin2hex(random_bytes(16));

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['reg']) && $_POST['user_type'] == "Passenger" || $_POST['user_type'] == "Driver") {
    $sql = "SELECT * FROM tblUser WHERE uEmail = '$email'";
    $result = mysqli_query($conn, $sql);

    //Check if credentials already taken
    if (mysqli_num_rows($result) === 0) {
        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);


        if ($_POST['user_type'] == "Passenger") {
            $level = '1';
        } else if ($_POST['user_type'] == "Driver") {
            $level = '2';
        }

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                        //Enable verbose debug output
            $mail->isSMTP();                                              //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                         //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                     //Enable SMTP authentication
            $mail->Username   = '1510cyan@gmail.com';                     //SMTP username - fuerteramonchristopher@gmail.com
            $mail->Password   = 'cpxgbytsouoxdwij';                       //SMTP password - biehdlavioyicybc
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;              //Enable implicit TLS encryption
            $mail->Port       = 465;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

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

            if (!$mail->send()) { ?>
                <script>
                    alert("<?php echo "Invalid Email!" ?>");
                </script>
            <?php
            } else {
                mysqli_query($conn, "INSERT INTO tblUser (uFirstName, uLastName, uEmail, uPass, uVerification_code, uLevel) VALUES ('$fname', '$lname', '$email', '$pass', '$v_code', '$level')");
            ?>
                <script>
                    alert("<?php echo "OTP code is sent to " . $email ?>")
                    window.location.replace("check.php");
                </script>
        <?php
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else { ?>
        <script>
            window.alert('Credentials Already Taken!');
            window.location.href = 'Register.php';
        </script>
<?php }
} else if ($_POST['user_type'] == "Admin") {
    //mysqli_query($conn, "INSERT INTO tblUser (uFirstName, uLastName, uEmail, uPass, uVerification_code, uLevel, uStatus) VALUES ('$fname', '$lname', '$email', '$pass', '$v_code', '3', '0')");
    header("Location: wait.php");
}


?>