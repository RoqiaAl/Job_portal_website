<?php
require "../../config.php";
if (isset($_POST['add_language'])) {
    $name=strip_tags($_POST['name']);
    $speaking=strip_tags($_POST['speaking']);
    $writing=strip_tags($_POST['writing']);
    
    $reading=strip_tags($_POST['reading']);
   
    
  
    

    $query=mysqli_query($con,"call add_language('$id','$name','$speaking','$writing','$reading');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
    setTimeout(function () {
        window.location.href = "../../jobseeker/language.php"; 
    }, 50);
</script>';
   
}
?>