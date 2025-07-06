<?php
require "../../config.php";
if (isset($_POST['add_training'])) {
    $title=strip_tags($_POST['title']);
    $inistitute=strip_tags($_POST['inistitute']);
    $timeframe=strip_tags($_POST['timeframe']);
    
    $type=strip_tags($_POST['type']);
    
  
    
    $query=mysqli_query($con,"call add_training('$id','$title','$inistitute','$timeframe','$type');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
    setTimeout(function () {
        window.location.href = "../../jobseeker/training.php"; 
    }, 50);
</script>';
   
}
?>