<?php

require "../../config.php";

$id = $_SESSION['user_id'] ?? null;
if (!$id) {
    echo '<script>alert("الرجاء تسجيل الدخول أولاً"); window.location.href = "../../auth/sign_in.php";</script>';
    exit;
}

if (isset($_POST['add_feedback'])) {
    $body = strip_tags($_POST['body']);

    $query = mysqli_query($con, "call add_feedback('$id','$body');");

    if ($query) {
        echo '<script>
            alert("تم إضافة التعليق بنجاح.");
            setTimeout(function () {
                window.location.href = "../../company/feedback.php"; 
            }, 50);س
        </script>';
    } else {
        echo '<script>
            alert("فشل في إضافة التعليق: ' . mysqli_error($con) . '");
            window.location.href = "../../company/feedback.php"; 
        </script>';
    }
}
?>
