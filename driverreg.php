<?php 
$id = $_GET['user'];
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

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.cwom" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Island+Moments&family=Lora:ital@0;1&family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet"> -->
    <title>CAR POOLING</title>

    <style>
        .container {
            padding-top: 150px;
        }
        p {
            color: white;
        }
    </style>
</head>

<body>
    <?php
    include "nav.php";
    ?>
    
    <div class="container">
        <form action="driverregprocess.php?user=<?php echo $id?>" method="post" class="form-signup" enctype="multipart/form-data">
            <h2>Driver Registration</h2>
            <br>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="carbrand" placeholder="Car Brand" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="carmodel" placeholder="Car Model" required>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cartype" placeholder="Car Type" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="carcolor" placeholder="Car Color" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="platenumber">Format: [AAA 9999]</label>
                <input type="text" class="form-control" name="platenumber" pattern="[A-Z]{3} [0-9]{4}" placeholder="Plate Number" required>
            </div><br>
            <div class="form-group mb-3">
                <label for="license" id="lid">LTO Certificate of Registration (OR CR): </label>
                <input type="file" class="form-control" name="my_image" required>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-secondary mt-2" name="submit" value="Submit">
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function show_alert() {
            var val = confirm("Do you want to Log Out?");
            if (val == true) {
                window.location.href = 'index.php';
            } else {
                alert("You pressed Cancel.");
            }
        }
    </script>
</body>

</html>