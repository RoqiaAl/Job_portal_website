<?php
require "../../config.php";
session_start();

$id = $_SESSION['user_id'] ?? null;
if (!$id) {
    die("معرف المستخدم غير موجود في الجلسة.");
}

if (isset($_POST['update_profile'])) {
    $username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phone']);
    $address = strip_tags($_POST['address']);

    $query = mysqli_query($con, "CALL update_profile('$id','$email','$username','$phone','$address');");

    $message = "";

    if ($query instanceof mysqli_result) {
        $row = mysqli_fetch_assoc($query);
        $message = $row['message'] ?? "تم التحديث بنجاح";
        mysqli_free_result($query);
        mysqli_next_result($con);
    } elseif ($query === true) {
        $message = "تم التحديث بنجاح";
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

if (isset($_POST['update_image'])) {
    $id = $_SESSION['user_id'] ?? null;
    if (!$id) {
        die("معرف المستخدم غير موجود في الجلسة.");
    }

    if (isset($_FILES["image"]) && $_FILES["image"]['error'] === UPLOAD_ERR_OK) {
        $image = addslashes(file_get_contents($_FILES["image"]['tmp_name']));
        $query = mysqli_query($con, "UPDATE `user` SET `image`='$image' WHERE `id`='$id'");
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
