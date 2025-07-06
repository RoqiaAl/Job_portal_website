<?php 
require "../connection.php";
if (isset($_POST['add_notification'])) {
   $sender_id=48;
   $title=strip_tags($_POST['title']);
   $users=strip_tags($_POST['users']);
   $text=strip_tags($_POST['text']);


   $query=mysqli_query($con,"call add_notification('$title','$users','$text','$sender_id');");
   header("location:notification.php");
}

if (isset($_GET['no'])) {
   $no=$_GET['no'];
   $query=mysqli_query($con,"call delete_by_clause('notification','id','$no');");
   
   echo "<script> alert('notification DELETED SUCCESSFULLY');</script>";
   header("location:notification.php");
}

if (isset($_POST['update_notification'])&&isset($_GET['id'])) {
   $id=$_GET['id'];
   $title=strip_tags($_POST['title']);
   $users=strip_tags($_POST['users']);
   $text=strip_tags($_POST['text']);


   $query=mysqli_query($con,"call update_notification('$id','$title','$users','$text');");
   header("location:notification.php");
}
?>