<?php
require "../connection.php";

    if (isset($_POST['add_category'])) {
        $category_name=$_POST['category_name'];
$query=mysqli_query($con,"INSERT INTO `category`(`name`) VALUES ('$category_name')");
header("location:category.php");

    }

    if (isset($_POST['update_category'])&&isset($_GET['id'])) {
        $id=$_GET['id'];
        $region_name=$_POST['category_name'];
$query=mysqli_query($con,"UPDATE `category` SET `name`='$region_name' WHERE `id`=$id");
header("location:category.php");

    }

    if (isset($_GET['no'])) {
        $no=$_GET['no'];
        $query=mysqli_query($con,"call delete_by_clause('category','id','$no');");
        
        echo "<script> alert('job DELETED SUCCESSFULLY');</script>";
        header("location:category.php");
    }
        ?>