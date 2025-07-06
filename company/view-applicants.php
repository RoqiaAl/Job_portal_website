<?php
require "../config.php";
if (isset($_GET['no'])) {

    $no = $_GET['no'];
}
if (isset($_POST['update_status'])) {
                                                
    $id = $_POST['id'];
    $status =$_POST['status'];
    $result2 = mysqli_query($con, "call set_situation('$id','$status','$no');");
    }
?>
<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online Job Management / Job Portal" />
    <meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/line-icons.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/jobs.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="../dashboard/css/custom.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/fontawesome-all.min.js"></script>
<script src="../js/form-jquery.js" type="text/javascript"></script>	
<script src="../js/main-js.js"></script>
<link href='../css/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="../css/preloader.css">
<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet" href="../css/jobs.css">
<link rel="stylesheet" href="../css/emp.css">

    <title>Applied Jobs</title>
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!--header-->
        <header>
            <!--navbar-->
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white" dir="ltr" >
            <div class="container-fluid"><a class="navbar-brand " href="#" style="color:  #0b5cff;">FORSAH</a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel" style="width: 50%;">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">logo</h5><button type="button"
                            class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                           
                                    <?php
                                    if (isset($id)&&isset($role)) {
                                        $query=mysqli_query($con,"select * from notification where users=$role OR users=''");
                                        $num=mysqli_num_rows($query);
                                        if ($role=='2') {
                                            ?>
                                            <li class="dropdown nav-item active">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <span class="material-icons">notifications</span>
                                                <span class="notification"><?php echo $num; ?> </span>
                                            </a> 
                                            <ul class="dropdown-menu">
                                         <?php   while ($row=mysqli_fetch_assoc($query)) {
                                            ?>
                                            <li><a href="#"><h5><?php echo $row['title']; ?></h5><?php echo $row['text']; ?></a></li>
                                            <?php }?>
                                            </ul>
                                           </li>  ';
                                        <?php
                                            echo '<li class="nav-item"><a class="nav-link mx-lg-2" href="../main/companies.php"><h5>الشركات</h5></a></li>';
                                            echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="profile.php"><h5>الملف الشخصي</h5></a></li>';
                                         
                    
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="profile.php">الملف الشخصي</a></li>';
                           echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="my-jobs.php">وظائفك المنشورة</a></li>';
                           echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="Feedback.php">تعليقاتك</a></li>';
                            
                           }
                          ?> 
                          <li class="nav-item"><a class="nav-link mx-lg-2" aria-current="page"
                            href="../index.php"><h5>الرئيسية</h5></a></li>
                             
                        </ul>
                        <?php
                        if (isset($id)) {
                            echo'<a href="../auth/sign_out.php" class="login-button">تسجيل خروج</a>';
                        }else{
                            echo '<a href="../auth/sign_up.html" class="login-button">دخول</a>';
                        }}
                        ?> 
                    </div>

                </div>

                <button id="r" class="navbar-toggler" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>

        </header>

        <div class="sectionn">
            <!--sidebar-->
            <?php if ($role<3) {
            ?>
            <div class="sidebarr">
                <div class="menuu menu-company">

                    <?php
                    require "../connection.php";
                    $result1 = mysqli_query($con, "call get_profile('$id');");
                    if (mysqli_num_rows($result1) > 0) {
                        $row = mysqli_fetch_assoc($result1);


                    ?>
                        <ul>

                            <li class="profilee">
                                <div class="imgg-box">
                                    <img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['image']) ?> " alt="profile">
                                </div>
                                <h2 class="user_name"><?php echo $row['username']; ?></h2>
                            </li>
                            <div class="linee"></div>
                            <li>
                                <a href="profile.php">
                                    <i class='bx bx-building-house icon'></i>
                                    <span class="texts">الملف الشخصي </span>
                                </a>
                            </li>
                            <li>
                                <a class="activee" href="my-jobs.php">
                                    <i class='bx bxs-bookmark icon'></i>
                                    <span class="texts">وظائفك المنشورة</span>
                                </a>
                            </li>
                            <li>
                                <a href="Feedback.php">
                                    <i class='bx bx-message-detail icon'></i>
                                    <span class="texts">تعليقاتك</span>
                                </a>
                            </li>
                            <div class="linee"></div>
                            
                            <!-- <li class="log-out">
                                <a href="../auth/sign_out.php">
                                    <i class="bx bx-log-out icon"></i>
                                    <span class="texts">تسجيل الخروج</span>
                                </a>
                            </li> -->
                        </ul>
                    <?php }
                    mysqli_close($con); ?>


                </div>
            </div>
            <?php } ?>


            <!--content-->
            <div class="content">

                <!-- title -->
                <div class="title">
                    <h2 class="mb-3">عرض المتقدمين</h2>
                </div>


                <div class="container-xxl py-5">
                    <div>
                        <!--البداية-->
                        <?php
                        require "../connection.php";
                        $result2 = mysqli_query($con, "call view_job_applicant('$no');");

                        while ($row = mysqli_fetch_assoc($result2)) {
                        ?>
                            <div id="tab-1" class="tab-pane fade show p-0 active aos-init aos-animate" data-aos="fade-up">
                                <div class="resume-list-item p-4 mb-4">
                                    <div class="row g-2">
                                        <div class="col-sm-12 col-md-2">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['image']) ?> " alt="" style="width: 80px; height: 80px;">
                                        </div>
                                        <div class="col-sm-12 col-md-5 d-flex align-items-center">
                                            <div class="text-start ps-4">
                                                <span class="text-truncate me-3"><i class="bx bx-user text-primary me-2"></i>الاسم:<?php echo $row['full_name'] ?></span>
                                                <span class="text-truncate me-3"><i class="bx bxs-graduation icon text-primary me-2"></i> المستوى التعليمي:<?php echo $row['educational_level'] ?>-<?php echo $row['category_name'] ?></span>
                                                <span class="text-truncate me-3"><i class="bx bx-briefcase icon text-primary me-2"></i>الخبرة:<?php echo $row['exp_period'] ?></span>
                                                <span class="text-truncate me-3"><i class="bx bx-globe-alt text-primary me-2"></i> الجنس:<?php echo $row['gender'] ?></span>
                                            </div>
                                        </div>
                                        <?php if ($role<3) {
                                             ?>

                                        <div class="col-sm-12 col-md-2">
                                            <div class="">
                                                <form action="" method="post" >
                                                <label for="" class="">حالة التقديم: <button name="update_status">تحديث</button> </label>
                                                <select name="status" required class="selectpicker show-tick form-control" data-live-search="false">
                                                    <option value="" selected>Select</option>

                                                    <option <?php if ($row['status'] == "in_progress") {
                                                                print ' selected ';
                                                            } ?> value="in_progress"> جاري التقديم</option>
                                                    <option <?php if ($row['status'] == "accepted") {
                                                                print ' selected ';
                                                            } ?> value="accepted">مقبول</option>
                                                    <option <?php if ($row['status'] == "rejected") {
                                                                print ' selected ';
                                                            } ?> value="rejected">مرفوض</option>
                                                            <option <?php if ($row['status'] == "success") {
                                                                print ' selected ';
                                                            } ?> value="success">مقبول لشغر الوظيفه</option>

                                                </select>
                                                <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden >
                                                </form>
                                            </div>
                                           
                                            
                                        
                                        </div>
                                        <?php } ?>


                                        <div class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-primary" href="../main/mycv.php?id=<?php echo $row['id'] ?>"> السيرة الذاتية</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--النهاية-->


                    </div>
                </div>
            </div>
        </div>
        <!-- Back to Top -->
        <a href="#" id="hello" class="btn btn-lg  btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!--footer-->
    <footer class=" text-white pt-4 ">
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
            
            <img src="../img/logof.png" alt="" style="height: 50px; width: 70px; " >
            <p>فرصه عبارة عن منصة توظيف تربط بين الاشخاص المؤهلين والوظائف المناسبه بهدف تحسين وتطوير عملية التوظيف في اليمن.</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-md-0 mb-4">
               <a href="../main/features.php"> <h6 class="text-uppercase fw-bold pb-2 ">Features</h6></a>
               <a href="../main/services.php"> <h6 class="text-uppercase fw-bold pb-2">services</h6></a>
               <a href="../main/about.php"> <h6 class="text-uppercase fw-bold pb-2">about</h6></a>
               <a href="../main/reviews.php"> <h6 class="text-uppercase fw-bold ">testitionals</h6></a>
              
            </div>
            
            <div class="col-md-6 col-lg-4 col-xl-3 mx-auto mb-md-0 mb-4">
            <p><a href="../main/contact.php">get in touch</a></p>
                <p><i class="bi bi-telephone me-2"></i>Phone: +123456789</p>
                <p><i class="bi bi-envelope me-2"></i>Email: example@example.com</p>
            </div>
        </div>
        
    </div>
    <div class="text-center p-3 mb-0" style="background-color: rgba(0, 0, 0, 0.2);  ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="m-0 text-center text-md-center">Copyright &copy; 2024 forsah. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="social-icons ">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/preloader.js"></script>
</body>

</html>