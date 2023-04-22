<?php
$sname = "localhost";
$user = "u235219407_bryan";
$password = "Bryan@15";
$database = "u235219407_carpool_bryan";

// $sname= "localhost";
// $user= "root";
// $password = "";
// $database = "carpool";


$conn = mysqli_connect($sname, $user, $password, $database);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Registered Users</title>

    <style>
        body {
            padding-top: 150px;
        }

        h2 {
            color: white;
            text-align: center;
        }

        table {
            height: 110px;
            overflow-y: auto;
            background-color: white !important;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h2>Registered Users</h2>
        </div>

        <div class="reg-table">
            <table class="table table-striped table-hover">
                <thead>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Email </th>
                    <th> User Type </th>
                    <th> Date Registered </th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tblUser WHERE uStatus='1'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['uLevel'] == '1') {
                                $type = "Passenger";
                            } else if ($row['uLevel'] == '2') {
                                $type = "Driver";
                            }

                    ?>

                            <tr>
                                <td> <?php echo $row['uFirstName'] ?> </td>
                                <td> <?php echo $row['uLastName'] ?> </td>
                                <td> <?php echo $row['uEmail'] ?> </td>
                                <td> <?php echo $type ?> </td>
                                <td> <?php echo $row['uDate_Reg'] ?> </td>
                            </tr>


                    <?php }
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>