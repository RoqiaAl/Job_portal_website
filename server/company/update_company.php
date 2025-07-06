<?php
require "../../config.php";
session_start();

if (isset($_POST['update_company'])) {
    $id = $_SESSION['user_id'] ?? null; // تأكدي أنه معرف موجود في الجلسة
    if (!$id) {
        die("معرف الشركة غير موجود في الجلسة.");
    }

    $co_name = strip_tags($_POST['co_name']);
    $activity = strip_tags($_POST['activity']);
    $hr_phone = strip_tags($_POST['hr_phone']);
    $website = strip_tags($_POST['website']);
    $region_id = strip_tags($_POST['region_id']);
    $created_at = strip_tags($_POST['created_at']);
    $working_time = strip_tags($_POST['working_time']);
    $co_background = strip_tags($_POST['co_background']);
    $goal = strip_tags($_POST['goal']);
    $vision = strip_tags($_POST['vision']);

    $co_logo = null;
    if (isset($_FILES["co_logo"]) && $_FILES["co_logo"]['error'] === UPLOAD_ERR_OK) {
        $co_logo = addslashes(file_get_contents($_FILES["co_logo"]['tmp_name']));
    }

    // نفذ الاستعلام
    $query = mysqli_query($con, "CALL update_company(
        '$id','$co_name','$activity','$hr_phone','$website','$region_id','$created_at',
        '$working_time','$co_background','$goal','$vision'
    )");

    if ($query instanceof mysqli_result) {
        $row = mysqli_fetch_assoc($query);
        $message = $row['message'] ?? 'تم التحديث بنجاح';
        mysqli_free_result($query);
        mysqli_next_result($con);
    } elseif ($query === true) {
        $message = 'تم التحديث بنجاح';
        mysqli_next_result($con);
    } else {
        $message = "حدث خطأ في الاستعلام: " . mysqli_error($con);
    }

    echo '<script>
        alert("'.$message.'");
        setTimeout(function () {
            window.location.href = "../../company/profile.php"; 
        }, 50);
    </script>';
}

if (isset($_POST['update_logo'])) {
    $id = $_SESSION['user_id'] ?? null;
    if (!$id) {
        die("معرف الشركة غير موجود في الجلسة.");
    }
    if (isset($_FILES["image"]) && $_FILES["image"]['error'] === UPLOAD_ERR_OK) {
        $image = addslashes(file_get_contents($_FILES["image"]['tmp_name']));
        $query = mysqli_query($con, "UPDATE `compant` SET `co_logo`='$image' WHERE `id`='$id'");
        if ($query) {
            $message = "تم التحديث بنجاح";
        } else {
            $message = "حدث خطأ في التحديث: " . mysqli_error($con);
        }
    } else {
        $message = "لم يتم رفع صورة صالحة.";
    }
    echo '<script>
        alert("'.$message.'");
        setTimeout(function () {
            window.location.href = "../../company/profile.php"; 
        }, 50);
    </script>';
}
?>
