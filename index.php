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
            padding-top: 180px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="loginprocess.php" method="post" class="form-signup">
            <h2>Sign In!</h2>
            <p>Welcome User!</p>
            Don't have an account?
            <a href="register.php">Sign up</a>
            <hr>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <input type="checkbox" onclick="myFunction()"> Show Password
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-secondary mt-2" name="reg" value="Submit">
            </div>
        
        </form>
    </div>

    <script>
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