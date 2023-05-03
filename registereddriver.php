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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>CAR POOLING</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <style>
        .navbar-brand b{
            color: white;
        }

        .navbar {
            background-image: linear-gradient(to right, black, gray);
        }

        .nav-item a{
            color: white;
        }

        .container {
            margin-top: 90px;
        }

        h2 {
            color: white;
            text-align: center;
        }

        table {
            height: 500px;
            display: block;
            overflow-y: auto;
            background-color: white !important;
            border-radius: 5px;
            text-align: center;

        }

        /* body {
            background-color: white;
        } */
    </style>
</head>

<body>
<?php
    include "adminnav.php";
?>

    <div class="container">
        <h2> Registered Drivers </h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="5%">First name</th>
                    <th width="5%">Last name</th>
                    <th width="5%">Car Type</th>
                    <th width="5%">Car Brand</th>
                    <th width="5%">Car Model</th>
                    <th width="5%">Car Color</th>
                    <th width="5%">Car Platenumber</th>
                    <th width="5%">OR CR</th>
                    <th width="8%">Registration Date</th>
                    <th width="5%">Confirm</th>
                    <th width="5%">Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * from tblDriver left join tblUser on tbluser.uID=tblDriver.uID WHERE dConfirm='0' ORDER BY dDate_Reg";
                $query = $conn->query($sql);

                while ($row = $query->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['uFirstName'] ?></td>
                        <td><?php echo $row['uLastName'] ?></td>
                        <td><?php echo $row['dCar_type'] ?></td>
                        <td><?php echo $row['dCar_Brand'] ?></td>
                        <td><?php echo $row['dCar_model'] ?></td>
                        <td><?php echo $row['dCar_color'] ?></td>
                        <td><?php echo $row['dCar_platenumber'] ?></td>
                        <td><img src="valid/<?= $row['dORCR'] ?>" width="200"></td>
                        <td><?php echo date('Y-m-d', strtotime($row["dDate_Reg"])) ?></td>

                        <td>
                            <!-- SOFT DELETE -->
                            <a href="confirmdriver.php?id=<?php echo $row['dID']; ?>">
                                <button class="btn">
                                    <span class="las la-paper-plane"></span> Confirm
                                </button>
                            </a>
                        </td>
                        <td>
                            <!-- DELETE -->
                            <a href="deletedriver.php?id=<?php echo $row['dID']; ?>" onclick="return checkdelete()">
                                <button class="btn">
                                    <span class="las la-trash"></span> Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <script>
        function show_alert() {
            var val = confirm("Do you want to Log Out?");
            if (val == true) {
                window.location.href = 'index.php';
            } else {
                alert("You pressed Cancel.");
            }
        }

        function checkdelete(){
                return confirm('Are you sure you want to delete this record?');
                
            }
    </script>
</body>

</html>