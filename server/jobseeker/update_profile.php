<?php
require "../../config.php";
if (isset($_POST['update_profile'])) {
    $username=strip_tags($_POST['username']);
    $email=strip_tags($_POST['email']);
    $phone=strip_tags($_POST['phone']);
    $address=strip_tags($_POST['address']);
    

    $query=mysqli_query($con,"call update_profile('$id','$email','$username','$phone','$address');");

    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
        setTimeout(function () {
            window.location.href = "../../jobseeker/profile.php"; 
        }, 50);
    </script>';


}
if (isset($_POST['update_image'])) {
    $image=addslashes(file_get_contents($_FILES["image"]['tmp_name']));
    $query=mysqli_query($con,"UPDATE `user` SET `image`='$image' where `id`='$id'");
    echo '<script>
    alert("تم التحديث بنجاح");
        setTimeout(function () {
            window.location.href = "../../jobseeker/profile.php"; 
        }, 50);
    </script>';
}
?>