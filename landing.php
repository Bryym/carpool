<?php
include "conn.php";
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
                <?php
                $sql = "SELECT * FROM tblUser WHERE uStatus='1'";
                $query = $conn->query($sql);

                while ($row = $query->fetch_array()) {
                    if ($row['uLevel'] == '1') {
                        $type = "Passenger";
                    } else if ($row['uLevel'] == '2') {
                        $type = "Driver";
                    } else if ($row['uLevel'] == '3') {
                        $type = "Admin";
                    }

                ?>
                    <tbody>
                        <td> <?php echo $row['uFirstName'] ?> </td>
                        <td> <?php echo $row['uLastName'] ?> </td>
                        <td> <?php echo $row['uEmail'] ?> </td>
                        <td> <?php echo $type ?> </td>
                        <td> <?php echo $row['uDate_Reg'] ?> </td>
                    </tbody>

                <?php } ?>

            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>