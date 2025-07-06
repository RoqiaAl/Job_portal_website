<?php
require "../connection.php";

    if (isset($_POST['add_country'])) {
        $country_name=$_POST['country_name'];
$query=mysqli_query($con,"INSERT INTO `country`(`name`) VALUES ('$country_name')");
header("location:country.php");

    }

    if (isset($_POST['update_country'])&&isset($_GET['id'])) {
        $id=$_GET['id'];
        $country_name=$_POST['country_name'];
$query=mysqli_query($con,"UPDATE `country` SET `name`='$country_name' WHERE `id`=$id");
header("location:country.php");

    }

    if (isset($_GET['no'])) {
        $no=$_GET['no'];
        $query=mysqli_query($con,"call delete_by_clause('country','id','$no');");
        
        echo "<script> alert('job DELETED SUCCESSFULLY');</script>";
        header("location:country.php");
    }
        ?>