<?php
require "../../config.php";
if (isset($_POST['update_jobseeker'])) {
    $full_name=strip_tags($_POST['full_name']);
    $gender=strip_tags($_POST['gender']);
    $civil_status=strip_tags($_POST['civil_status']);
    $birth_data=strip_tags($_POST['birth_data']);
    $educational_level=strip_tags($_POST['educational_level']);
    $category_id=strip_tags($_POST['category_id']);
    $exp_period=strip_tags($_POST['exp_period']);
    $u_background=strip_tags($_POST['u_background']);

    $query=mysqli_query($con,"call update_jobseeker('$id','$full_name','$gender','$civil_status','$birth_data','$educational_level',
    '$category_id','$exp_period','$u_background');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
        setTimeout(function () {
            window.location.href = "../../jobseeker/profile.php"; 
        }, 50);
    </script>';
}
?>