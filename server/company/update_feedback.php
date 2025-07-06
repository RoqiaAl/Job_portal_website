<?php
require "../../config.php";
if (isset($_POST['update_feedback'])&&isset($_GET['no'])) {
    $no=$_GET['no'];
    $body=strip_tags($_POST['body']);
    
  
    $query=mysqli_query($con,"call update_feedback('$no','$body','$id');");
    
    
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
        setTimeout(function () {
            window.location.href = "../../company/feedback.php"; 
        }, 50);
    </script>';

}
?>