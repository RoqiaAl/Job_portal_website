<?php
require "../../config.php";
if (isset($_POST['add_experience'])) {
    $title=strip_tags($_POST['title']);
    $inistitute=strip_tags($_POST['inistitute']);
    $p_phone=strip_tags($_POST['p_phone']);
    
    $start_date=strip_tags($_POST['start_date']);
    $end_date=strip_tags($_POST['end_date']);
    $responsability=strip_tags($_POST['responsability']);
  
    

    $query=mysqli_query($con,"call add_experience('$id','$title','$inistitute','$p_phone','$start_date','$end_date',
    '$responsability');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
    setTimeout(function () {
        window.location.href = "../../jobseeker/experience.php"; 
    }, 50);
</script>';

}
?>