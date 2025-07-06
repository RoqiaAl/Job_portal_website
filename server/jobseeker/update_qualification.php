<?php
require "../../config.php";
if (isset($_POST['update_qualification'])&&isset($_GET['no'])) {
    $no=$_GET['no'];
    $educational_level=strip_tags($_POST['educational_level']);
    $title=strip_tags($_POST['title']);
    $inistitute=strip_tags($_POST['inistitute']);
    $timeframe=strip_tags($_POST['timeframe']);
    $country_id=strip_tags($_POST['country_id']);
    $grade=strip_tags($_POST['grade']);
  
    

    $query=mysqli_query($con,"call update_qualification('$educational_level','$title','$inistitute','$timeframe','$country_id',
    '$grade','$no','$id');");
    $row=mysqli_fetch_assoc($query);
    echo '<script>
    alert("'. $row['message'].'");
        setTimeout(function () {
            window.location.href = "../../jobseeker/qualifications.php"; 
        }, 50);
    </script>';

}
?>