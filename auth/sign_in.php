<?php
session_start();
require "../connection.php";

$email= strip_tags($_POST['email']);
$password= strip_tags($_POST['password']);
   //a stored procedure that get stored password.

   
$query=mysqli_query($con,"call user_signin('$email')");
//select hashed_password from dtabase to compare with entered one.

    
    
    if (mysqli_num_rows($query)>0) {
        $row=mysqli_fetch_assoc($query);
        if ($row['status']==2) {
            echo '<script>
            alert("لقد تم حظر هذا الحساب من قبل إدارة المنصة");
            setTimeout(function () {
                window.location.href = "register.php"; 
            }, 50);
        </script>';
            
        }
if (password_verify($password,$row['hash_password'])) {
    
           $_SESSION['user_id']=$row["user_id"];
          $_SESSION["user_email"]=$row["user_email"];
          $_SESSION['role_id']=$row["role_id"];
      //redirect user according to its role.
      if ($_SESSION['role_id']== 1) {
        header("location:../index.php");
    }
    if ($_SESSION['role_id']==2) {
        header("location:../index.php");
    }elseif ($_SESSION['role_id']>2) {
        header("location:../dashboard");
    }
 }else {
            echo '<script>
            alert("الايميل المدخل او كلمة المرور خطأ");
            setTimeout(function () {
                window.location.href = "register.php"; 
            }, 50);
        </script>';
            
}
    
}else {
    echo '<script>
    alert("المستخد غير موجود تاكد من كتابة البيانات ");
    setTimeout(function () {
        window.location.href = "register.php"; 
    }, 50);
</script>';
    
}


       
       
 

?>