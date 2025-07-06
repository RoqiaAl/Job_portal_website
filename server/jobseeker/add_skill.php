<?php
require "../../config.php";
if (isset($_POST['add_skill'])) {
    $title=strip_tags($_POST['title']);
    
    
  
    

    $query=mysqli_query($con,"call add_skill('$id','$title');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
    setTimeout(function () {
        window.location.href = "../../jobseeker/skills.php"; 
    }, 50);
</script>';

}
?>