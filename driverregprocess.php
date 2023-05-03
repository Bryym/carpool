<?php 
$id = $_GET['user'];
$brand = $_POST['carbrand'];
$model = $_POST['carmodel'];
$type = $_POST['cartype'];
$color = $_POST['carcolor'];
$plate = $_POST['platenumber'];

if (isset($_POST['submit']) && isset($_FILES['my_image'])){

    include "conn.php";
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $img_name= $_FILES['my_image']['name'];
    $img_size= $_FILES['my_image']['size'];
    $tmp_name= $_FILES['my_image']['tmp_name'];
    $error= $_FILES['my_image']['error'];

    if ($error === 0){
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)){
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'valid/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            
            mysqli_query($conn, "INSERT INTO tblDriver (uID, dCar_type, dCar_Brand, dCar_model, dCar_color, dCar_platenumber, dORCR) values('$id','$type','$brand','$model','$color','$plate','$new_img_name')");
            header ("Location: passengerinfo.php?user=".$id);
        }else {
            ?>
            <script>
                window.alert("You can't upload files of this type!");
                window.location.href = 'driverreg.php?user=<?php echo $id?>';
            </script>
        <?php
        }

    }else {
        ?>
        <script>
            window.alert("Unknown error occured!");
            window.location.href = 'driverreg.php?user=<?php echo $id?>';
        </script>
<?php
    }

}else {
    header("Location: driverreg.php?user=$user");
}

?>