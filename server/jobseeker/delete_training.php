<?php 
require "../../config.php";
if (isset($_GET['no'])) {
    $no=$_GET['no'];
    $query=mysqli_query($con,"call delete_by_clause('training','id','$no');");

    echo '<script>
    alert(" تم الحذف بنجاح");
        setTimeout(function () {
            window.location.href = "../../jobseeker/training.php"; 
        }, 50);
    </script>';
}

?>