<?php 
require "../../config.php";
if (isset($_GET['no'])) {
    $no=$_GET['no'];
    $query=mysqli_query($con,"call delete_by_clause('skill','id','$no');");

    echo '<script>
    alert(" تم الحذف بنجاح");
        setTimeout(function () {
            window.location.href = "../../jobseeker/skills.php"; 
        }, 50);
    </script>';
}

?>