<?php
 
 session_start();
  
 
 session_destroy();
header("location:../index.php");
exit;
?>
<script>
window.onbeforeunload = function() {
  return "هل أنت متأكد من أنك تريد مغادرة هذه الصفحة؟";
};
</script>