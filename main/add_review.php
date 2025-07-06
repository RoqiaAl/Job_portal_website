<?php
require "../connection.php";
if (isset($_POST['add_review'])&&isset($_GET['id'])) {
   $u_id=$_GET['id'];
   $review=$_POST['review'];
   $query=mysqli_query($con,"INSERT INTO `review`( `u_id`, `review`) values ( `$id`, `$review`)");
   echo '<script>
   alert(" تمت الإضافة بنجاح");
   setTimeout(function () {
       window.location.href = "../index.php"; 
   }, 50);
</script>';
}
?>