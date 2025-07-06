<?php
require "../../config.php";
if (isset($_POST['update_language'])&&isset($_GET['no'])) {
    $no=$_GET['no'];
    $name=strip_tags($_POST['name']);
    $speaking=strip_tags($_POST['speaking']);
    $writing=strip_tags($_POST['writing']);
    
    $reading=strip_tags($_POST['reading']);
   
    $sql=mysqli_query($con,"call update_language('$no','$name','$speaking','$writing','$reading','$id');");
  
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
        setTimeout(function () {
            window.location.href = "../../jobseeker/language.php"; 
        }, 50);
    </script>';


}
?>