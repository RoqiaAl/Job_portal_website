<?php
require "../connection.php";
if (isset($_POST['update_replay'])&&isset($_GET['id'])) {
    $id=$_GET['id'];
    $replay=$_POST['replay'];
$query=mysqli_query($con,"UPDATE `feedback` SET `replay`='$replay' WHERE `id`=$id");
header("location:feedback.php");

}
?>