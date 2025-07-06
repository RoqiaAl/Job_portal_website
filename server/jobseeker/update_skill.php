<?php
require "../../config.php";
if (isset($_POST['update_skill'])&&isset($_GET['no'])) {
    $no=$_GET['no'];
    $title=strip_tags($_POST['title']);
    
  
    
    $query=mysqli_query($con,"call update_skill('$no','$title');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
        setTimeout(function () {
            window.location.href = "../../jobseeker/skills.php"; 
        }, 50);
    </script>';
    

}
?>