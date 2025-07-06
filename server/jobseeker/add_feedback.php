<?php
require "../../config.php";
if (isset($_POST['add_feedback'])) {
    $body=strip_tags($_POST['body']);
    
    
  
    

    $query=mysqli_query($con,"call add_feedback('$id','$body');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
    setTimeout(function () {
        window.location.href = "../../jobseeker/feedback.php"; 
    }, 50);
</script>';
    

}
?>