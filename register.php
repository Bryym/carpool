<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.cwom" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Island+Moments&family=Lora:ital@0;1&family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet"> -->
    <title>CAR POOLING</title>

    <style>
        body {
            padding-top: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="regprocess.php" method="post" class="form-signup">
            <h2>Sign Up!</h2>
            <p>Welcome new User!</p>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <input type="checkbox" onclick="myFunction()"> Show Password
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
            </div>
            <div class="form-group mb-3">
            <center>
        <input type="radio" id="passenger" name="user_type" value="Passenger" required>
        <label for="passenger">Passenger</label>
        <input type="radio" id="driver" name="user_type" value="Driver">
        <label for="driver">Driver</label>   
        <!-- <input type="radio" id="admin" name="user_type" value="Admin">
        <label for="driver">Admin</label>   -->
            </center>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="" required>
                    I accept the <a href="#">Terms & Conditions.</a>
                </label>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-secondary mt-2" name="reg" value="Submit">
            </div>
        
        </form>
    </div>

    <script>
        //for checking password (if same)
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Password Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        //for showing password
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>