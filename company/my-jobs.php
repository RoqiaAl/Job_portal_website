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

    if (isset($_GET['job_edit'])) {

        $no = $_GET['job_edit'];
        $sql = mysqli_query($con, "call get_by_clause('job','id','$no');");
        $row = mysqli_fetch_assoc($sql);
    ?>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">تعديل الوظيفة</h4>
                        <button type="button" class="close" onclick="goBack()" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../server/company/update_job.php?id=<?php echo $row['id']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="row gap-20 modalbody">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label> المسمى الوظيفي </label>
                                        <input name="title" required type="text" class="form-control" value="<?php echo $row['title']; ?>" placeholder="ادخل  المسمى الوظيفي ">
                                    </div>
                                </div>
                                <div class="clear"></div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>التخصص</label>
                                        <select name="category_id" required class="selectpicker show-tick form-control" data-live-search="true">
                                            <option disabled value="">Select</option>
                                            <?php
                                            require '../connection.php';
                                            $stmt = mysqli_query($con, "select * from category;");
                                            if (mysqli_num_rows($stmt) > 0) {
                                                while ($cat = mysqli_fetch_assoc($stmt)) { ?>
                                                    <option <?php if ($cat['id'] == $row['category_id']) {
                                                                print ' selected ';
                                                            } ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>

                                            <?php }
                                            } ?>



                                        </select>
                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-6">

                                    <div class="form-group">
                                        <label> العدد المطلوب</label>
                                        <input type="text" name="req_no" required class="form-control" value="<?php echo $row['req_no']; ?>" placeholder=" أدخل العدد المطلب">
                                    </div>

                                </div>
                                <div class="clear"></div>

                                <div class="col-sm-6 col-md-6">

                                    <div class="form-group">
                                        <label> تاريخ الاغلاق</label>
                                        <input type="date" name="date_line" required class="form-control" value="<?php echo $row['date_line']; ?>">
                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-6">

                                    <div class="form-group">
                                        <label>المدينة</label>
                                        <select name="region_id" required class="selectpicker show-tick form-control" data-live-search="true">
                                            <option disabled value="">Select</option>
                                            <?php
                                            require '../connection.php';
                                            $stmt = mysqli_query($con, "select * from region;");
                                            if (mysqli_num_rows($stmt) > 0) {
                                                while ($cat = mysqli_fetch_assoc($stmt)) { ?>
                                                    <option <?php if ($cat['id'] == $row['region_id']) {
                                                                print ' selected ';
                                                            } ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>

                                            <?php }
                                            } ?>



                                        </select>
                                    </div>

                                </div>
                                <div class="clear"></div>
                                <div class=" col-sm-6 col-md-6">

                                    <div class="form-group ">
                                        <label>نوع الدوام</label>
                                        <select name="working_time" required class="selectpicker show-tick form-control" data-live-search="false">
                                            <option value="" selected>Select</option>

                                            <option <?php if ($row['working_time'] == "full_time") {
                                                        print ' selected ';
                                                    } ?> value="full_time"> دوام كامل</option>
                                            <option <?php if ($row['working_time'] == "part_time") {
                                                        print ' selected ';
                                                    } ?> value="part_time">نصف دوام</option>
                                            <option <?php if ($row['working_time'] == "online") {
                                                        print ' selected ';
                                                    } ?> value="online">online</option>

                                        </select>
                                    </div>

                                </div>
                                <div class=" col-sm-6 col-md-6">
                                    <div class="form-group ">
                                        <label>الخبرة</label>

                                        <select name="exp_period" required class=" form-group selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
                                            <option value="" selected>Select</option>

                                            <option <?php if ($row['exp_period'] == "لايوجد خبرة") {
                                                        print ' selected ';
                                                    } ?> value="لايوجد خبرة">لايوجد خبرة</option>
                                            <option <?php if ($row['exp_period'] == "سنتين ") {
                                                        print ' selected ';
                                                    } ?> value="سنتين">سنتين</option>
                                            <option <?php if ($row['exp_period'] == "ثلاث سنوات") {
                                                        print ' selected ';
                                                    } ?> value="ثلاث سنوات">ثلاث سنوات</option>
                                            <option <?php if ($row['exp_period'] == "خمس سنوات") {
                                                        print ' selected ';
                                                    } ?> value="خمس سنوات">خمس سنوات</option>
                                            <option <?php if ($row['exp_period'] == "سبع سنوات") {
                                                        print ' selected ';
                                                    } ?> value="سبع سنوات">سبع سنوات</option>
                                            <option <?php if ($row['exp_period'] == "اكثر من سبع سنوات") {
                                                        print ' selected ';
                                                    } ?> value="اكثر من سبع سنوات">اكثر من سبع سنوات</option>
                                        </select>

                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6">

                                    <div class="form-group">
                                        <label> الراتب</label>
                                        <input type="text" name="salary" required class="form-control" value="<?php echo $row['salary']; ?>">
                                    </div>

                                </div>

                                <div class="clear"></div>

                                <div class="col-sm-12 col-md-12">

                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                        <label>الوصف الوظيفي:</label>
                                        <textarea name="description" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الوصف الوظيفي" style="height: 200px;"><?php echo $row['description']; ?></textarea>
                                    </div>

                                </div>

                                <div class="col-sm-12 col-md-12">

                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                        <label>مسؤوليات الوظيفة:</label>
                                        <textarea name="responsability" required class="bootstrap3-wysihtml5 form-control" placeholder="ادخل المسؤوليات" style="height: 200px;"><?php echo $row['responsability']; ?></textarea>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                        <label>المتطلبات:</label>
                                        <textarea name="requirements" required class="bootstrap3-wysihtml5 form-control" placeholder="ادخل المتطلبات" style="height: 200px;"><?php echo $row['requirements']; ?></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer text-center">
                                <button type="submit" class="btn btn-primary" name="update_job">حفظ</button>
                                <button type="button" data-bs-dismiss="modal" onclick="goBack()" class="btn btn-primary">إلغاء</button>
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
                                <a class="activee" href="#">
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
<?php }?>
            <!--content-->
            <div class="content">

                <!-- title -->
                <div class="title">
                    <h2 class="mb-3">الوظائف المنشورة</h2>
                </div>


                <!-- list -->
                <div class="container-xxl py-5">
                    <div>
                        <?php
                        require "../connection.php";
                        $result2 = mysqli_query($con, "call get_my_posted_jobs('$id');");

                        while ($row = mysqli_fetch_assoc($result2)) {

                        ?>
                            <!--البداية-->
                            <div id="tab-1" class="tab-pane fade show p-0 active aos-init aos-animate">
                                <div class="resume-list-item p-4 mb-4">
                                    <div class="row g-2">

                                        <div class="col-sm-12 col-md-2">

                                            <img class="flex-shrink-0 img-fluid border rounded" src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['co_logo']) ?> " alt="" style="width: 80px; height: 80px;">
                                        </div>
                                        <div class="col-sm-12 col-md-6 d-flex align-items-center">


                                            <div class="text-start ps-4">
                                                <a href="job_details.php?id=<?php echo $row['id']; ?>">
                                                    <h5 class="mb-3"><?php echo $row['title']; ?></h5>
                                                </a>
                                                <span class="text-truncate me-3"><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $row['date_line']; ?></span>
                                                <span class="text-truncate me-0"><i class="far fa-clock text-primary me-2"></i><?php echo $row['working_time']; ?></span>
                                                <span class="text-truncate me-3"><i class="bx bx-group text-primary me-2"></i><?php echo $row['req_no']; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">

                                                <div class="resume-list-btn">

                                                    <a class="btn btn-primary btn-sm mb-2 mb-0-sm" href="view-applicants.php?no=<?php echo $row['id']; ?>"> متقدم للوظيفة</a>
                                                    <?php if ($role<3) {
                                                        ?>
                                                    <a href="?job_edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-2 mb-0-sm">تعديل الوظيفة</a>
                                                    <a onclick="return confirm('هل انت متاكد انك تريد الحذف ؟')" class="btn btn-primary btn-sm mb-2 mb-0-sm" href="../server/company/delete_job.php?id=<?php echo $row['id']; ?>">حذف الوظيفة</a>
                                                        <?php }?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--النهاية-->
                          <?php if ($role<3) {    
                           ?>                              
                        <div class="d-flex mb-3">
                            <a data-bs-toggle="modal" href="#QualifModal" class="btn btn-primary">نشر وظيفة</a>
                        </div>
                        <?php }?>
                        <div class="modal" id="QualifModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-center">نشر الوظيفة</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../server/company/post_job.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row gap-20 modalbody">



                                                <div class="col-sm-12 col-md-12">

                                                    <div class="form-group">
                                                        <label> المسمى الوظيفي </label>
                                                        <input name="title" required type="text" class="form-control" value="" placeholder="ادخل  المسمى الوظيفي ">
                                                    </div>

                                                </div>
                                                <div class="clear"></div>

                                                <div class="col-sm-6 col-md-6">

                                                    <div class="form-group">
                                                        <label>التخصص</label>
                                                        <select class="form-control" name="category_id">
                                                            <option selected value="">select</option>
                                                            <?php
                                                            require "../connection.php";
                                                            $query = mysqli_query($con, "select * from category;");
                                                            if (mysqli_num_rows($query) > 0) {
                                                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                                            <?php }
                                                            }
                                                            mysqli_close($con);
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-sm-6 col-md-6">

                                                    <div class="form-group">
                                                        <label> العدد المطلوب</label>
                                                        <input type="number" name="req_no" required class="form-control" value="" placeholder=" أدخل العدد المطلب">
                                                    </div>

                                                </div>
                                                <div class="clear"></div>

                                                <div class="col-sm-6 col-md-6">

                                                    <div class="form-group">
                                                        <label> تاريخ الاغلاق</label>
                                                        <input type="date" name="date_line" required class="form-control" value="">
                                                    </div>

                                                </div>

                                                <div class="col-sm-6 col-md-6">

                                                    <div class="form-group">
                                                        <label>المدينة</label>
                                                        <select class="form-control" name="region_id">
                                                            <option selected value="">select</option>
                                                            <?php
                                                            require "../config.php";
                                                            $query = mysqli_query($con, "select * from region;");
                                                            if (mysqli_num_rows($query) > 0) {
                                                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                                            <?php }
                                                            }
                                                            mysqli_close($con); ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="clear"></div>
                                                <div class=" col-sm-6 col-md-6">

                                                    <div class="form-group ">
                                                        <label>نوع الدوام</label>
                                                        <select name="working_time" class="form-control">
                                                            <option selected value="">وقت الدوام</option>
                                                            <option value="full_time">دوام كامل</option>
                                                            <option value="part_time">دوام جزئي</option>
                                                            <option value="online">online</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class=" col-sm-6 col-md-6">
                                                    <div class="form-group ">
                                                        <label>الخبرة</label>
                                                        <select name="exp_period" required class=" form-group selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
                                                            <option value="" selected>Select</option>

                                                            <option value="لايوجد خبرة">لايوجد خبرة</option>
                                                            <option value="سنتين">سنتين</option>
                                                            <option value="ثلاث سنوات">ثلاث سنوات</option>
                                                            <option value="خمس سنوات">خمس سنوات</option>
                                                            <option value="سبع سنوات">سبع سنوات</option>
                                                            <option value="اكثر من سبع سنوات">اكثر من سبع سنوات</option>
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="clear"></div>
                                                <div class="col-sm-6 col-md-6">

                                                    <div class="form-group">
                                                        <label> الراتب</label>
                                                        <input type="text" name="salary" required class="form-control" value="">
                                                    </div>

                                                </div>
                                                <div class="clear"></div>
                                                <div class="col-sm-12 col-md-12">

                                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                        <label>الوصف الوظيفي:</label>
                                                        <textarea name="description" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الوصف الوظيفي" style="height: 200px;"></textarea>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12 col-md-12">

                                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                        <label>مسؤوليات الوظيفة:</label>
                                                        <textarea name="responsability" required class="bootstrap3-wysihtml5 form-control" placeholder="ادخل المسؤوليات" style="height: 200px;"></textarea>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-12">

                                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                        <label>المتطلبات:</label>
                                                        <textarea name="requirements" required class="bootstrap3-wysihtml5 form-control" placeholder="ادخل المتطلبات" style="height: 200px;"></textarea>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer text-center">
                                                <button type="submit" onclick="validate(this)" class="btn btn-primary" name="post_job">نشر</button>
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


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->

        <script type="text/javascript">
    $(window).on('load',function(){
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
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/preloader.js"></script>
</body>

</html>