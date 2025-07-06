<?php
require "../connection.php";
if (isset($_GET['status_no'])) {
$id=$_GET['status_no'];
$status=$_GET['status'];
$query=mysqli_query($con,"update job set status=$status where id=$id");
header("location:jobs.php");
}

if (isset($_POST['add_job'])) {
    $id=$_POST['co_id'];
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
    

    $query=mysqli_query($con,"call post_job('$id','$title','$region_id','$category_id','$req_no','$description','$responsability',
    '$requirements','$working_time','$exp_period','$salary','$date_line');");
if ($query) {
    $mess=mysqli_fetch_assoc($query);
    
    echo "<script> alert('$mess[message]');</script>";
    header("location:jobs.php");
}
}

if (isset($_GET['no'])) {
    $no=$_GET['no'];
    $query=mysqli_query($con,"call delete_by_clause('job_applicants','j_id','$no');");
    $query=mysqli_query($con,"call delete_by_clause('job','id','$no');");
    echo "<script> alert('job DELETED SUCCESSFULLY');</script>";
    header("location:jobs.php");
}

if (isset($_POST['update_job'])) {
    $id=$_GET['id'];
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
    

    $query=mysqli_query($con,"call update_job('$id','$title','$region_id','$category_id','$req_no','$description','$responsability',
    '$requirements','$working_time','$exp_period','$salary','$date_line');");

    header("location:jobs.php");
}
?>