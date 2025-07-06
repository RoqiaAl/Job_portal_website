<?php
require "connection.php";
session_start();

if(!empty($_SESSION["user_id"])){
    $id= $_SESSION["user_id"];
    $email=$_SESSION["user_email"];
    $role=$_SESSION["role_id"];
  
}
?>
