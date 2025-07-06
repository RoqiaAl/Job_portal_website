<?php 
require "../../config.php";
if (isset($_GET['no'])) {
    $no=$_GET['no'];
    $query=mysqli_query($con,"call delete_by_clause('feedback','id','$no');");

    echo '<script>
    alert(" تم الحذف بنجاح");
    setTimeout(function () {
        window.location.href = "../../company/feedback.php"; 
    }, 50);
</script>';
}

?>