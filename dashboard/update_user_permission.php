<?php 
require "../connection.php";

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