<?php
require "../../config.php";
if (isset($_POST['change_password'])) {
   
 
    $old= $_POST['old_password'];
    $new=$_POST['new_password'];
    $confirm=$_POST['confirm_password'];
    
    $query=mysqli_query($con,"select password from `auth` where auth.id=$id;");
    $row=mysqli_fetch_assoc($query);
    if (password_verify($old,$row['password'])) {
        if ($new==$confirm) {
            $password=password_hash($new,PASSWORD_BCRYPT);
           $query=mysqli_query($con,"call update_password('$id','$password')");
           echo '<script>
            alert("تم تحديث كلمة المرور بنجاح");
            setTimeout(function () {
                window.location.href = "../../company/profile.php"; 
            }, 50);
        </script>';
        }else{
            echo '<script>
            alert("كلمة المرور الجديدة غير متطابقه مع تاكيدها");
            setTimeout(function () {
                window.location.href = "../../company/profile.php"; 
            }, 50);
        </script>';
        }
    }else{
        echo '<script>
        alert("ادخل كلمة مرور صحيحة");
        setTimeout(function () {
            window.location.href = "../../company/profile.php"; 
        }, 50);
    </script>';
     }
    }
?>