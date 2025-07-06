<?php
require "../../config.php";

    if (isset($_POST['post_job'])) {
        $title=strip_tags($_POST['title']);
        $region_id=strip_tags($_POST['region_id']);
        $category_id=strip_tags($_POST['category_id']);
        $req_no=strip_tags($_POST['req_no']);
        $description=strip_tags($_POST['description']);
        $responsability=strip_tags($_POST['responsability']);
        $requirements=strip_tags($_POST['requirements']);
        $working_time=strip_tags($_POST['working_time']);
        $exp_period=strip_tags($_POST['exp_period']);
        
        $salary=strip_tags($_POST['salary']);
        $date_line=strip_tags($_POST['date_line']);
        
    
        $query=mysqli_query($con,"call post_job('$id','$title','$region_id','$category_id',
        '$req_no','$description','$responsability','$requirements','$working_time','$exp_period'
        ,'$salary','$date_line');");
    if ($query) {
        $mess=mysqli_fetch_assoc($query);
        
        echo '<script>
    alert("'. $mess.'");
    setTimeout(function () {
        window.location.href = "../../company/my-jobs.php"; 
    }, 50);
</script>';
    
    }
}

?>