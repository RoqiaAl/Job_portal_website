<?php
require "../connection.php";

if (isset($_POST['add_region'])) {
    $region_name = $_POST['region_name'];
    $query = mysqli_query($con, "INSERT INTO `region`(`name`) VALUES ('$region_name')");
    header("location:region.php");
}

if (isset($_GET['no'])) {
    $no = $_GET['no'];
    $query = mysqli_query($con, "call delete_by_clause('region','id','$no');");

    echo "<script> alert('job DELETED SUCCESSFULLY');</script>";
    header("location:region.php");
}

if (isset($_POST['update_region']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $region_name = $_POST['region_name'];
    $query = mysqli_query($con, "UPDATE `region` SET `name`='$region_name' WHERE `id`=$id");
    header("location:region.php");
}
