<?php
require "../connection.php";
if (isset($_GET['status_no'])) {
$id=$_GET['status_no'];
$status=$_GET['status'];
$query=mysqli_query($con,"update auth set status=$status where id=$id");
header("location:users.php");
}

if (isset($_POST['update_user'])&&isset($_GET['id'])) {
    $id=$_GET['id'];
    $email=strip_tags($_POST['email']);
    $username=strip_tags($_POST['username']);
    
    $phone=strip_tags($_POST['phone']);
    $address=strip_tags($_POST['address']);

    $query=mysqli_query($con,"call update_profile('$id','$email','$username','$phone','$address');");
    header("location:users.php");

}

if (isset($_POST['update_image'])&&isset($_GET['id'])) {
    $id=strip_tags($_GET['id']);
    $image=addslashes(file_get_contents($_FILES["image"]['tmp_name']));
    $query=mysqli_query($con,"update `user` set `image` = '$image' where `id` = '$id' ");
    header("location:users.php");
}
?>