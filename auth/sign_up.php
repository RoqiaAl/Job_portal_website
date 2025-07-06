<?php

require "../connection.php";

    $username= strip_tags($_POST['username']);
$email= strip_tags($_POST['email']);
$address= strip_tags($_POST['address']);
$phone= strip_tags($_POST['phone']);
$password=  strip_tags($_POST['password']);
$confirm_password= strip_tags($_POST['confirm_password']);
$role_id= strip_tags($_POST['role_id']);



if ($password==$confirm_password) {
    $pass=password_hash($password,PASSWORD_BCRYPT);

$query=mysqli_query($con,"call user_signup('$username','$email',
'$address','$phone','$pass','$role_id')");

if ($query) {
    mysqli_next_result($con);
    $row=mysqli_fetch_assoc($query);
    
        echo '<script> alert("'.$row['message'].'");
        setTimeout(function () {
            var emailValue ="'.$email.'"
        window.location.href = "register.php?email=" + encodeURIComponent(emailValue);
        }, 50);
        </script>';
       
}
else {
    echo '<script> alert("كلمة المرور غير متطابقة مع تاكيدها");
        setTimeout(function () {
            window.location.href = "register.php"; 
        }, 50);
        </script>';
}


}
?>