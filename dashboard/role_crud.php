<?php
require "../connection.php";

if (isset($_POST['add_role'])) {
  $role_name = $_POST['role_name'];
  $query = mysqli_query($con, "INSERT INTO `role`(`role_name`) VALUES ('$role_name')");
  header("location:../role.php");
}

if (isset($_POST['add_privilege'])) {
  $id = $_GET['id'];
  $privelege = $_POST['privilege'];
  foreach ($privelege as $privelegeitem) {
    //echo $privelegeitem."<br>";
    $query = mysqli_query($con, "INSERT INTO `role_privilege`(`role_id`, `privilege_id`) VALUES ('$id','$privelegeitem')");
    header("location:view_privileges.php?id=$id");
  }
}
if (isset($_POST['update_privilege'])) {
  $id = $_GET['id'];
  $privelege = $_POST['privilege'];
  $sql_delete = mysqli_query($con, "DELETE FROM role_privilege WHERE role_id = $id");

  if (isset($_POST['privilege'])) {


    foreach ($privelege as $privelegeitem) {
      //echo $privelegeitem."<br>";
      $query = mysqli_query($con, "INSERT INTO `role_privilege`(`role_id`, `privilege_id`) VALUES ('$id','$privelegeitem')");
      header("location:view_privileges.php?id=$id");
    }
  }
}
