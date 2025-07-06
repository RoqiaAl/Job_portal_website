<?php 
require "../../config.php";
if (isset($_GET['id'])) {
    $no=$_GET['id'];
    $query=mysqli_query($con,"call delete_by_clause('job','id','$no');");

    echo '<script>
    alert("تم الحذف بنجاح");
    setTimeout(function () {
        window.location.href = "../../company/my-jobs.php"; 
    }, 50);
</script>';
}

?>