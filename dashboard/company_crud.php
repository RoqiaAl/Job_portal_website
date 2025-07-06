<?php
require "../connection.php";

if (isset($_GET['status_no'])) {
$id=$_GET['status_no'];
$status=$_GET['status'];
$query=mysqli_query($con,"update compant set status=$status where id=$id");
header("location:company.php");
}

if (isset($_POST['add_company'])) {
    $id=strip_tags($_POST['user_id']);
    $co_name=strip_tags($_POST['co_name']);
    $activity=strip_tags($_POST['activity']);
    $hr_phone=strip_tags($_POST['hr_phone']);
    $website=strip_tags($_POST['website']);
    $region_id=strip_tags($_POST['region_id']);
    $created_at=strip_tags($_POST['created_at']);
    $working_time=strip_tags($_POST['working_time']);
    $co_background=strip_tags($_POST['co_background']);
    $garantee=addslashes(file_get_contents($_FILES["garantee"]['tmp_name']));
    $goal=strip_tags($_POST['goal']);
    $vision=strip_tags($_POST['vision']);
    $co_logo=addslashes(file_get_contents($_FILES["co_logo"]['tmp_name']));

    $query=mysqli_query($con,"call add_company('$id','$co_name','$activity','$hr_phone','$website','$region_id','$created_at',
    '$working_time','$co_background','$garantee','$goal','$vision','$co_logo');");
if ($query) {
    $mess=mysqli_fetch_assoc($query);
}
header("location:company.php");
}

if (isset($_POST['update_company'])) {
    $id=strip_tags($_GET['id']);
    $co_name=strip_tags($_POST['co_name']);
    $activity=strip_tags($_POST['activity']);
    $hr_phone=strip_tags($_POST['hr_phone']);
    $website=strip_tags($_POST['website']);
    $region_id=strip_tags($_POST['region_id']);
    $created_at=strip_tags($_POST['created_at']);
    $working_time=strip_tags($_POST['working_time']);
    $co_background=strip_tags($_POST['co_background']);
    
    $goal=strip_tags($_POST['goal']);
    $vision=strip_tags($_POST['vision']);
   

    $query=mysqli_query($con,"call update_company('$id','$co_name','$activity','$hr_phone','$website','$region_id','$created_at',
    '$working_time','$co_background','$goal','$vision','$user_id');");

}

if (isset($_POST['update_garantee'])&&isset($_GET['id'])) {
    $id=strip_tags($_GET['id']);
    $garantee=addslashes(file_get_contents($_FILES["garantee"]['tmp_name']));
    $query=mysqli_query($con,"update `compant` set `garantee` = '$garantee' where `id` = '$id' ");
    header("location:company.php");
}
?>