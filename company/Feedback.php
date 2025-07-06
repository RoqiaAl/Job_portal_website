what is the problem why does not the edit modal appear on pressing تعديل button
<?php require "../config.php"; ?>
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

<?php
if (isset($_GET['fb_edit'])) {
    $no = $_GET['fb_edit'];

    // تنظيف الاتصال قبل إجراء جديد
    mysqli_next_result($con);

    $sql = mysqli_query($con , "CALL get_by_clause('feedback','id','$no')");
    if (!$sql) {
        die("فشل تنفيذ الإجراء: " . mysqli_error($con));
    }

    $row_feedback = mysqli_fetch_assoc($sql);
?>
<div class="modal fade" id="edit" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">تعديل التعليق</h4>
                <button type="button" class="close" onclick="goBack()" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="../server/company/update_feedback.php?no=<?php echo $row_feedback['id']; ?>" method="POST">
                    <div class="form-group">
                        <label>نص التعليق</label>
                        <textarea class="form-control" name="body" required><?php echo $row_feedback['body']; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="update_feedback">حفظ</button>
                        <button type="button" class="btn btn-secondary" onclick="goBack()">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

   
    
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
                                <a  href="my-jobs.php">
                                    <i class='bx bxs-bookmark icon'></i>
                                    <span class="texts">وظائفك المنشورة</span>
                                </a>
                            </li>
                            <li>
                                <a class="activee" href="Feedback.php">
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

    
             <!--content-->
             <div class="content">

                <!-- title -->
                <div class="title">
                    <h2 class="mb-3">تعليقاتك</h2>
                </div>
                
    
                <!-- list -->
                <div class="container-xxl py-5">
                    <div>
                        <div class="row g-4 text-start">
                        <?php
                            require "../connection.php";
                            $result2 = mysqli_query($con, "call get_by_clause('feedback','u_id','$id');");

                            while ($row = mysqli_fetch_assoc($result2)) {

                            ?>
                            <div class="col-md-6">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="job-item p-4">
                                        <div class="row g-4">
                                            <h4>التعليق :</h4>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <div class="text-start ps-4 textScroll">
                                                    <p class="text-container"><?php echo $row['body']; ?></p>
                                                </div>
                                            </div>
                                            <?php if ($row['replay']!='') {
                                             ?>
                                            <h4> الرد :</h4>
                                            
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <div class="text-start ps-4 textScroll">
                                                    <p class="text-container"><?php echo $row['replay']; ?></p>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="col-sm-12 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                <div class="d-flex">
                    
                                                    <div class="resume-list-btn">
                                                            
                                                    <a href="?fb_edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-0-sm">تعديل</a>
                                                            <a onclick="return confirm('هل انت متاكد انك تريد الحذف ؟')" class="btn btn-primary btn-sm mb-0-sm btn-delete" href="../server/company/delete_feedback.php?no=<?php echo $row['id']; ?>">حذف</a>
                                                           
                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>




                        <div>

                            <div class="d-flex mb-3 mt-4">
                                <a data-bs-toggle="modal" href="#QualifModal" class="btn btn-primary">إضافة جديد</a>
                            </div>

                            <div class="modal" id="QualifModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">إضافة تعليق</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../server/company/add_feedback.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                <div class="row gap-20 modalbody">

                                                    <div class="col-sm-12 col-md-12">

                                                        <div class="form-group">
                                                            <label>نص التعليق</label>
                                                            <input class="form-control" placeholder="اكتب تعليقك هنا" type="text" name="body" required>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="modal-footer text-center">
                                                    <button type="submit" class="btn btn-primary" name="add_feedback">حفظ</button>
                                                    <button type="button" data-bs-dismiss="modal" onclick="goBack()" class="btn btn-primary">إلغاء</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

 
                    </div>
 
                </div>
            </div>
    
        </div>

    

        
        <!--footer-->
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
</div>

<script type="text/javascript">
        $(window).on('load', function() {
            $('#edit').modal('show');
        });
    </script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <script>
        $('#edit').modal({
            backdrop: 'static',
            keyboard: false
        })
    </script>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/preloader.js"></script>
</body>

</html>