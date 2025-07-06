<?php
require "../../config.php";

if (isset($_POST['update_job']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = strip_tags($_POST['title'] ?? '');
    $region_id = strip_tags($_POST['region_id'] ?? '');
    $category_id = strip_tags($_POST['category_id'] ?? '');
    $req_no = strip_tags($_POST['req_no'] ?? '');
    $description = strip_tags($_POST['description'] ?? '');
    $responsability = strip_tags($_POST['responsability'] ?? '');
    $requirements = strip_tags($_POST['requirements'] ?? '');
    $working_time = strip_tags($_POST['working_time'] ?? '');
    $exp_period = strip_tags($_POST['exp_period'] ?? '');
    $salary = strip_tags($_POST['salary'] ?? '');
    $date_line = strip_tags($_POST['date_line'] ?? '');

    $query = mysqli_query($con, "CALL update_job('$id','$title','$region_id','$category_id','$req_no','$description','$responsability','$requirements','$working_time','$exp_period','$salary','$date_line');");

    if ($query instanceof mysqli_result) {
        $mess = mysqli_fetch_assoc($query);
        $message = $mess['message'] ?? "تم التحديث بنجاح";
        mysqli_free_result($query);
        mysqli_next_result($con);
    } elseif ($query === true) {
        $message = "تم التحديث بنجاح";
        mysqli_next_result($con);
    } else {
        $message = "خطأ في الاستعلام: " . mysqli_error($con);
    }

    echo '<script>
        alert("'.$message.'");
        setTimeout(function () {
            window.location.href = "../../company/feedback.php";
        }, 50);
    </script>';
}
?>
