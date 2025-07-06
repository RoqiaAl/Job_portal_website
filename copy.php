<?php 
require "connection.php";
$query=mysqli_query($con," call apply_job(4,45);");
$row=mysqli_fetch_assoc($query);
echo $row['message']
?>