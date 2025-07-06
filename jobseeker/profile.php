<?php require "../config.php"

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

                                        if (!empty($id)&&$role=='1') {
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
                                             echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="../main/jobs.php"><h5>قائمة الوظائف</h5></a></li>';
                                             echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="profile.php"><h5>الملف الشخصي</h5></a></li>';
                                            
                                           
                                        
                            echo'<li class="nav-item mobile-menu "><a class="nav-link mx-lg-2" href="../main/mycv.php">رؤية ال CV</a></li>';
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="qualifications.php">المؤهلات الأكاديمية</a></li>';
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="experience.php">الخبرات العملية</a></li>';
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="language.php">اللغات التي تجيدها</a></li>';
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="training.php">الدورات التدريبية</a></li>';
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="skills.php">المهارات</a></li>';
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="applied-jobs.php">الوظائف المقدم عليها</a></li>';
                            echo'<li class="nav-item mobile-menu"><a class="nav-link mx-lg-2" href="Feedback.php">تعليقاتك</a></li>';
                                           }}?>
                                           
                                   
                        
                         
                         <li class="nav-item"><a class="nav-link mx-lg-2 active" aria-current="page"
                                    href="../index.php"><h5>الرئيسية</h5></a></li>
                        </ul>
                        <?php
                        if (isset($id)) {
                            echo'<a href="../auth/sign_out.php" class="login-button">تسجيل خروج</a>';
                        }else{
                            echo '<a href="../auth/register.php" class="login-button">دخول</a>';
                        }
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
                <div class="menuu">
                    <?php
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
                            <li class="cv">
                                <a href="../main/mycv.php">
                                    <i class='bx bx-file icon'></i>
                                    <span class="texts">رؤية ال CV</span>
                                </a>
                            </li>
                            <li>
                                <a class="activee" href="#">
                                    <i class='bx bx-user icon'></i>
                                    <span class="texts">الملف الشخصي</span>
                                </a>
                            </li>
                            <li>
                                <a href="qualifications.php">
                                    <i class='bx bxs-graduation icon'></i>
                                    <span class="texts">المؤهلات الأكاديمية</span>
                                </a>
                            </li>
                            <li>
                                <a href="experience.php">
                                    <i class='bx bx-briefcase icon'></i>
                                    <span class="texts">الخبرات العملية</span>
                                </a>
                            </li>
                            <li>
                                <a href="language.php">
                                    <i class='bx bx-globe-alt icon'></i>
                                    <span class="texts">اللغات التي تجيدها</span>
                                </a>
                            </li>
                            <li>
                                <a href="training.php">
                                    <i class='bx bx-layer icon'></i>
                                    <span class="texts">الدورات التدريبية</span>
                                </a>
                            </li>
                            <li>
                                <a href="skills.php">
                                    <i class='bx bx-bar-chart-square icon'></i>
                                    <span class="texts">المهارات</span>
                                </a>
                            </li>
                            <li>
                                <a href="applied-jobs.php">
                                    <i class='bx bxs-bookmark icon'></i>
                                    <span class="texts">الوظائف المقدم عليها</span>
                                </a>
                            </li>
                            <li>
                                <a href="Feedback.php">
                                    <i class='bx bx-message-detail icon'></i>
                                    <span class="texts">تعليقاتك</span>
                                </a>
                            </li>
                            <div class="linee"></div>
                            <li>
                                <a class="dangerous" onclick="return confirm('هل انت متاكد انك تريد حذف حسابك ؟')" href="../server/jobseeker/delete_account.php">
                                    <i class='bx bx-trash icon'></i>
                                    <span class="texts">حذف الحساب</span>
                                </a>
                            </li>
                            <!-- <li class="log-out">
                                <a href="../auth/sign_out.php">
                                    <i class="bx bx-log-out icon"></i>
                                    <span class="texts">Logout</span>
                                </a>
                            </li> -->
                        </ul>


                </div>
            </div>
            <!--content-->
           
            <div class="content">

                <!-- title -->
                <div class="title">
                    <h2 class="mb-3">الملف الشخصي</h2>
                    <p>اخر تسجيل دخول لك بتاريخ:<span class="text-primary"><?php echo $row['last_login']; ?></span></p>
                </div>
                <!-- <div class="linee linee-long"></div> -->


                <div class="container-xxl py-5">
                    <div class="profile-carte p-4 mb-4">

                        <div class="profileCarteHeader">
                            <form action="../server/jobseeker/update_profile.php" method="post" enctype="multipart/form-data" >
                            <div class="upload">
                                <img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['image']) ?> " alt="">
                                <div class="round">
                                    <input type="file" name="image" >
                                    <i class="fa fa-camera" style="color: #fff"></i>
                                </div>
                            </div>
                            <h5 class="text-center user-carte"><button type="submit" name="update_image" style="border: none; font-weight: bold; " ><?php echo $row['username']; ?></button></h5>
                             </form>
                        </div>
                           
                                <!-- <h6 class="text-center">Full-Stack  Developer</h3> -->
                        
                        <div class="row gap-20 profileCarteBody">
                            <div class="col-sm-12 col-md-6">
                                <div class="col-sm-12">
                                    <p class="borderr"><strong>الإميل:</strong><?php echo $row['email']; ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="borderr"><strong>العنوان:</strong><?php echo $row['address']; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="col-sm-12">
                                    <p class="borderr"><strong>رقم الهاتف:</strong><?php echo $row['phone']; ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <a data-bs-toggle="modal" href="#change-password" class="primary">تغيير كلمة المرور</a>
                                    <div class="modal" id="change-password">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تغيير كلمة المرور</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form name="frm" action="../server/jobseeker/change_password.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                        <div class="row gap-20 modalbody text-centerr">
    
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>كلمة المرور القديمة</label>
                                                                    <input type="password" class="form-control center" name="old_password" >
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
    
                                                            <div class="col-sm-6">
                                    
                                                                <div class="form-group">
                                                                    <label>كلمة المرور الجديدة</label>
                                                                    <input type="password" class="form-control center" name="new_password" required >
                                                                </div>
                                        
                                                            </div>
                                                            <div class="clear"></div>
    
                                                            <div class="col-sm-6">
                                    
                                                                <div class="form-group">
                                                                    <label>تأكيد كلمة المرور</label>
                                                                    <input type="password" class="form-control center"  name="confirm_password" required >
                                                                </div>
                                        
                                                            </div>
    
                                                        </div>
    
                                                        <div class="modal-footer text-center">
                                                            <button type="submit" class="btn btn-primary" name="change_password">تعديل</button>
                                                            <button type="button" data-bs-dismiss="modal" class="btn btn-primary">إلغاء</button>
                                                        </div>
                                                    </form>
    
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="resume-list-btn">

                            <a data-bs-toggle="modal" href="#edit" class="btn btn-primary">تعديل</a>

                            <div class="modal" id="edit">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">تعديل</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../server/jobseeker/update_profile.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                <div class="row gap-20 modalbody">

                                                    <div class="clear"></div>

                                                    <div class="col-sm-6 col-md-6">

                                                        <div class="form-group">
                                                            <label>اسم المستخدم </label>
                                                            <input name="username" required type="text" class="form-control" value="<?php echo $row['username']; ?>" placeholder="ادخل اسمك ">
                                                        </div>

                                                    </div>


                                                    <div class="col-sm-6 col-md-6">

                                                        <div class="form-group">
                                                            <label>الإميل</label>
                                                            <input type="email" name="email" required class="form-control" value="<?php echo $row['email']; ?>" placeholder="ادخل الإمايل">
                                                        </div>

                                                    </div>

                                                    <div class="clear"></div>

                                                    <div class="col-sm-6 col-md-6">

                                                        <div class="form-group">
                                                            <label>العنوان </label>
                                                            <input name="address" required type="text" class="form-control" value="<?php echo $row['address']; ?>" placeholder="ادخل عنوان السكن ">
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-6 col-md-6">

                                                        <div class="form-group">
                                                            <label>رقم الهاتف</label>
                                                            <input type="text" name="phone" required class="form-control" value="<?php echo $row['phone']; ?>">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer text-center">
                                                    <button type="submit" class="btn btn-primary" name="update_profile">تعديل</button>
                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-primary">إلغاء</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php }
                     mysqli_close($con);
                        ?>
                        </div>

                    </div>



                    <?php
                    require "../connection.php";
                    $result2 = mysqli_query($con, "call get_jobseeker('$id');");
                    if (mysqli_num_rows($result2) > 0) {
                        $row = mysqli_fetch_assoc($result2);


                    ?>
                        <div class="profile-carte p-4 mb-4">

                            <div class="row gap-20 profileCarteBody">


                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>الاسم الرباعي:</strong><?php echo $row['full_name']; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>الجنس:</strong><?php echo $row['gender']; ?></p>
                                </div>

                                <div class="clear"></div>

                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>المستوى التعليمي:</strong><?php echo $row['educational_level']; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>القسم:</strong><?php echo $row['category_name']; ?></p>
                                </div>

                                <div class="clear"></div>

                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>تاريخ الميلاد:</strong><?php echo $row['birth_data']; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>الحالة الاجتماعية:</strong><?php echo $row['civil_status']; ?></p>
                                </div>

                                <div class="clear"></div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>سنوات الخبرة:</strong><?php echo $row['exp_period']; ?></p>
                                </div>

                                <div class="clear"></div>

                                <div class="col-xs-4 col-sm-12 col-md-12 mb-20 borderr">
                                    <p><strong>النبذة التعريفية عنك:</strong></p>
                                    <div class="text-start ps-4 textScroll">
                                        <p><?php echo $row['u_background']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-list-btn">

                                <a data-bs-toggle="modal" href="#edit2" class="btn btn-primary">تعديل</a>
                                <div class="modal" id="edit2">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">تعديل</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../server/jobseeker/update_jobseeker.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                    <div class="row gap-20 modalbody">

                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>الاسم الرباعي</label>
                                                                <input type="text" name="full_name" required class="form-control" value="<?php echo $row['full_name']; ?>" placeholder="ادخل الاسم الرباعيا">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">

                                                            <div class="form-group">
                                                                <label>الجنس</label>
                                                                <select name="gender" required class="selectpicker show-tick form-control" data-live-search="false">
                                                                    <option value="" selected>Select</option>
                                                                    <option <?php if ($row['gender'] == "ذكر") {
                                                                                print ' selected ';
                                                                            } ?> value="ذكر">ذكر</option>
                                                                    <option <?php if ($row['gender'] == "انثى") {
                                                                                print ' selected ';
                                                                            } ?> value="انثى">انثى</option>

                                                                </select>
                                                            </div>

                                                        </div>


                                                        <div class="clear"></div>

                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>المستوى التعليمي</label>
                                                                <select name="educational_level" required class=" form-group selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
                                                                    <option value="" selected>Select</option>

                                                                    <option <?php if ($row['educational_level'] == "بروفيسور") {
                                                                                print ' selected ';
                                                                            } ?> value="بروفيسور">بروفيسور</option>
                                                                    <option <?php if ($row['educational_level'] == "دكتوراة") {
                                                                                print ' selected ';
                                                                            } ?> value="دكتوراة">دكتوراة</option>
                                                                    <option <?php if ($row['educational_level'] == "ماجستير") {
                                                                                print ' selected ';
                                                                            } ?> value="ماجستير">ماجستير</option>
                                                                    <option <?php if ($row['educational_level'] == "بكالوريوس") {
                                                                                print ' selected ';
                                                                            } ?> value="بكالوريوس">بكالوريوس</option>
                                                                    <option <?php if ($row['educational_level'] == "شهادة دبلوم") {
                                                                                print ' selected ';
                                                                            } ?> value="شهادة دبلوم">شهادة دبلوم</option>
                                                                    <option <?php if ($row['educational_level'] == "ثانوية عامه") {
                                                                                print ' selected ';
                                                                            } ?> value="ثانوية عامه">ثانوية عامه</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>القسم</label>

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

                                                        <div class="clear"></div>

                                                        <div class="col-sm-6 col-md-6">

                                                            <div class="form-group">
                                                                <label>تاريخ الميلاد</label>
                                                                <input type="date" name="birth_data" required class="form-control" value="<?php echo $row['birth_data']; ?>">
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-6 col-md-6">

                                                            <div class="form-group">
                                                                <label>الحالة الاجتماعية</label>
                                                                <select name="civil_status" required class="selectpicker show-tick form-control" data-live-search="false">
                                                                    <option value="" selected>Select</option>

                                                                    <option <?php if ($row['civil_status'] == "متزوج") {
                                                                                print ' selected ';
                                                                            } ?> value="متزوج"> متزوج/ة</option>
                                                                    <option <?php if ($row['civil_status'] == "عازب") {
                                                                                print ' selected ';
                                                                            } ?> value="عازب">عازب/ة</option>
                                                                    <option <?php if ($row['civil_status'] == "ارمل") {
                                                                                print ' selected ';
                                                                            } ?> value="ارمل">ارمل/ة</option>

                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="clear"></div>

                                                        <div class="col-sm-6 col-md-6">
                                                            <label>سنوات الخبرة</label>
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

                                                        <div class="clear"></div>

                                                        <div class="col-xs-4 col-sm-12 col-md-12">

                                                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                                <label>تحدث عن نفسك</label>
                                                                <textarea name="u_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل وصف نفسك" style="height: 200px;"><?php echo $row['u_background']; ?></textarea>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="modal-footer text-center">
                                                        <button type="submit" class="btn btn-primary" name="update_jobseeker">تعديل</button>
                                                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">إلغاء</button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    <?php } ?>

                    <?php
                    require "../connection.php";
                    $query = mysqli_query($con, "call get_jobseeker('$id');");
                    if (mysqli_num_rows($query) > 0) {
                        echo   ' <a data-bs-toggle="modal" href="#QualifModal" class="btn btn-primary" hidden > اضافةالبيانات الشخصية</a>';
                    } else {

                        echo   ' <a data-bs-toggle="modal" href="#QualifModal" class="btn btn-primary"  > اضافةالبيانات الشخصية</a>';
                    }
                    ?>
                </div>



                <div class="modal" id="QualifModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">إضافة</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="../server/jobseeker/add_jobseeker.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <div class="row gap-20 modalbody">

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>الاسم الرباعي</label>
                                                <input type="text" name="full_name" required class="form-control" placeholder="ادخل الاسم الرباعيا">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">

                                            <div class="form-group">
                                                <label>الجنس</label>
                                                <select name="gender" required class="selectpicker show-tick form-control" data-live-search="false">
                                                    <option selected value="">حدد</option>
                                                    <option value="ذكر">ذكر</option>
                                                    <option value="انثى">انثى</option>

                                                </select>
                                            </div>

                                        </div>


                                        <div class="clear"></div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>المستوى التعليمي</label>
                                                <select name="educational_level" required class=" form-group selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
                                                    <option value="" selected>Select</option>

                                                    <option value="بروفيسور">بروفيسور</option>
                                                    <option value="دكتوراة">دكتوراة</option>
                                                    <option value="ماجستير">ماجستير</option>
                                                    <option value="بكالوريوس">بكالوريوس</option>
                                                    <option value="شهادة دبلوم">شهادة دبلوم</option>
                                                    <option value="ثانوية عامه">ثانوية عامه</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>القسم</label>
                                                <select name="category_id" required class="selectpicker show-tick form-control" data-live-search="true">
                                                    <option selected value="">Select</option>
                                                    <?php
                                                    require '../connection.php';
                                                    $stmt = mysqli_query($con, "select * from category;");
                                                    if (mysqli_num_rows($stmt) > 0) {
                                                        while ($cat = mysqli_fetch_assoc($stmt)) { ?>
                                                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>

                                                    <?php }
                                                    } ?>



                                                </select>
                                            </div>
                                        </div>

                                        <div class="clear"></div>

                                        <div class="col-sm-6 col-md-6">

                                            <div class="form-group">
                                                <label>تاريخ الميلاد</label>
                                                <input type="date" name="birth_data" required class="form-control" value="">
                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6">

                                            <div class="form-group">
                                                <label>الحالة الاجتماعية</label>
                                                <select name="civil_status" required class="selectpicker show-tick form-control" data-live-search="false">
                                                    <option value="" selected>Select</option>

                                                    <option value="متزوج"> متزوج/ة</option>
                                                    <option value="عازب">عازب/ة</option>
                                                    <option value="ارمل">ارمل/ة</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="clear"></div>

                                        <div class="col-sm-6 col-md-6">

                                            <div class="form-group">
                                                <label>سنوات الخبرة</label>
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

                                        <div class="col-xs-4 col-sm-12 col-md-12">

                                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                <label>تحدث عن نفسك</label>
                                                <textarea name="u_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل وصف نفسك" style="height: 200px;"></textarea>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="modal-footer text-center">
                                        <button type="submit" name="add_jobseeker" class="btn btn-primary">حفظ</button>
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">إلغاء</button>
                                    </div>
                                </form>

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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/preloader.js"></script>
   
</body>

</html>