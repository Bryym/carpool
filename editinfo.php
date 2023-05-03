<?php
include "conn.php";
$id = $_GET['user'];

$sql = "SELECT * FROM tblUser WHERE uID = '$id'";
$query = $conn->query($sql);
$row = $query->fetch_array();
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
        .container {
            padding-top: 180px;
        }
    </style>
</head>

<body>
    <?php
    include "nav.php";
    ?>
    <div class="container">
        <form action="editprocess.php?user=<?php echo $id?>" method="post" class="form-signup" onSubmit="return confirm('Do you want to submit?')">
            <h2>Edit Profile Info</h2>
            <br>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $row['uFirstName'];?>" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $row['uLastName'];?>" required>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['uEmail'];?>" required>
            </div>
            <div class="form-group mb-3">
                <label>
                    <input type="checkbox" name="" required>
                    I accept the <a href="#">Terms & Conditions.</a>
                </label>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-secondary mt-2" name="edit" value="Submit">
            </div>
            <!-- <div class="form-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <input type="checkbox" onclick="showPass()"> Show Password
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" required>
            </div> -->
        </form>
    </div>
</body>

</html>