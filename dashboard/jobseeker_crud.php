<?php
require "../connection.php";

if (isset($_POST['add_jobseeker'])) {
    $id=$_POST['user_id'];
    $full_name=strip_tags($_POST['full_name']);
    $gender=strip_tags($_POST['gender']);
    $civil_status=strip_tags($_POST['civil_status']);
    $birth_data=strip_tags($_POST['birth_data']);
    $educational_level=strip_tags($_POST['educational_level']);
    $category_id=strip_tags($_POST['category_id']);
    $exp_period=strip_tags($_POST['exp_period']);
    $u_background=strip_tags($_POST['u_background']);

    $query=mysqli_query($con,"call add_jobseeker('$id','$full_name','$gender','$civil_status','$birth_data','$educational_level',
    '$category_id','$exp_period','$u_background');");
    if ($query) {
        $mess=mysqli_fetch_assoc($query);
        
        echo "<script> alert('$mess[message]');</script>";
    header("location:jobseeker.php");
    }
}

if (isset($_POST['update_jobseeker'])) {
    $id=$_GET['id'];
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
    header("location:jobseeker.php");
}

if (isset($_POST['update_permission'])&&isset($_GET['id'])) {
    $id=$_GET['id'];
    $privelege=$_POST['privilege'];
    $sql_delete = mysqli_query($con,"DELETE FROM user_permission WHERE user_id = $id");
    
if (isset($_POST['privilege'])) {
  
 
    foreach($privelege as $privelegeitem){
      //echo $privelegeitem."<br>";
      $query=mysqli_query($con,"INSERT INTO `user_permission`(`user_id`, `privilege_id`) VALUES ('$id','$privelegeitem')");
      header("location:user_customization.php?id=$id");
    }
  }
 }
?>