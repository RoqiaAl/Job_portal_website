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
                                <a class="activee" href="#">
                                    <i class='bx bx-building-house icon'></i>
                                    <span class="texts">الملف الشخصي </span>
                                </a>
                            </li>
                            <li>
                                <a href="my-jobs.php">
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



                </div>
            </div>
               <!--content-->
            <div class="content">

                <!-- title -->
                <div class="title">
                    <h2 class="mb-3">الملف الشخصي</h2>
                    <p>اخر تسجيل دخول لك بتاريخ:<span class="text-primary"><?php echo $row['last_login']; ?></span></p>
                </div>
                

            <div class="container-xxl py-5">
                <div class="profile-carte p-4 mb-4">
                        
                    <div class="profileCarteHeader">
                    <form action="../server/company/update_profile.php" method="post" enctype="multipart/form-data" >
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
                    <div class="row gap-20 profileCarteBody">
                        
                        <div class="col-sm-12 col-md-6">
                            <p class="borderr"><strong>الإميل:</strong><?php echo $row['email']; ?></p>
                        </div>
                        
                        
                        <div class="col-sm-12 col-md-6">
                            <p class="borderr"><strong>رقم الهاتف:</strong><?php echo $row['phone']; ?></p>
                        </div>

                        <div class="clear"></div>
                        
                        <div class="col-sm-12 col-md-6">
                            <p class="borderr"><strong>العنوان:</strong><?php echo $row['address']; ?></p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                                <a data-bs-toggle="modal" href="#change-password" class="primary">تغيير كلمة المرور</a>
                                <div class="modal" id="change-password">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">تغيير كلمة المرور</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="frm" method="POST" action="../server/company/change_password.php" autocomplete="off" enctype="multipart/form-data">
                                                    <div class="row gap-20 modalbody text-centerr">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>كلمة المرور القديمة</label>
                                                                <input type="password" class="form-control center" name="old_password" required>
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
                                        <form action="../server/company/update_profile.php" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                                              <button type="submit" class="btn btn-primary" name="update_profile" >تعديل</button>
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
                    $result2 = mysqli_query($con, "call get_company('$id');");
                    if (mysqli_num_rows($result2) > 0) {
                        $row = mysqli_fetch_assoc($result2);


                    ?>
                        <div class="profile-carte p-4 mb-4">
                        <div class="profileCarteHeader">
                    <form action="../server/company/update_company.php" method="post" enctype="multipart/form-data" >
                            <div class="upload">
                                <img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['co_logo']) ?> " alt="">
                                <div class="round">
                                    <input type="file" name="image" >
                                    <i class="fa fa-camera" style="color: #fff"></i>
                                </div>
                            </div>
                            <h5 class="text-center user-carte"><button style="border: none;" type="submit" name="update_logo"> update</button></h5>
                    </form>
                    </div>
                            <div class="row gap-20 profileCarteBody">
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>اسم الشركة:</strong><?php echo $row['co_name']; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>نشاط الشركة:</strong><?php echo $row['activity']; ?></p>
                                </div>
                                <div class="clear"></div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>الموقع الإلكتروني:</strong><?php echo $row['website']; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>رقم هاتف الموارد البشرية:</strong><?php echo $row['hr_phone']; ?></p>
                                </div>
                                <div class="clear"></div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>المنطقة:</strong><?php echo $row['name']; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>تاريخ إنشاء الشركة:</strong><?php echo $row['created_at']; ?></p>
                                </div>
                                <div class="clear"></div>
                                <div class="col-sm-12 col-md-6">
                                    <p class="borderr"><strong>وقت عمل الشركة:</strong><?php echo $row['working_time']; ?></p>
                                </div>
                                <div class="clear"></div>

                                <div class="col-xs-4 col-sm-12 col-md-12 mb-3 borderr">
                                    <p><strong>نبذة تعريفية عن الشركة:</strong></p>
                                    <div class="text-start ps-4 textScroll">
                                        <p><?php echo $row['co_background']; ?></p>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-12 col-md-12 mb-3 borderr">
                                    <p><strong>الرؤية:</strong></p>
                                    <div class="text-start ps-4 textScroll">
                                        <p><?php echo $row['vision']; ?></p>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-12 col-md-12 mb-3 borderr">
                                    <p><strong>الهدف:</strong></p>
                                    <div class="text-start ps-4 textScroll">
                                        <p><?php echo $row['goal']; ?></p>
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
                <form action="../server/company/update_company.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="row gap-20 modalbody">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>اسم الشركة</label>
                                <input name="co_name" required type="text" class="form-control" value="<?php echo $row['co_name']; ?>" placeholder="ادخل اسم الشركة ">
                            </div>

                        </div>


                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>نشاط الشركة</label>
                                <input type="text" name="activity" required class="form-control" value="<?php echo $row['activity']; ?>" placeholder="على سبيل المثال مثل :الحجز ,السفر">
                            </div>

                        </div>

                        <div class="clear"></div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>الموقع الإلكتروني</label>
                                <input type="text" name="website" required class="form-control" value="<?php echo $row['website']; ?>" placeholder=" أدخل العنوان ">
                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>رقم هاتف الموارد البشرية</label>
                                <input type="text" name="hr_phone" required class="form-control" value="<?php echo $row['hr_phone']; ?>">
                            </div>

                        </div>

                        <div class="clear"></div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>المنطقة</label>
                                <select name="region_id" required class="selectpicker show-tick form-control" data-live-search="true">
                                    <option selected value="">Select</option>
                                    <?php
                                    require "../connection.php";
                                    $stmt = mysqli_query($con, "select * from region;");
                                    if (mysqli_num_rows($stmt) > 0) {
                                        while ($cat = mysqli_fetch_assoc($stmt)) { ?>
                                            <option <?php if ($cat['id'] == $row['region_id']) {
                                                        print ' selected ';
                                                    } ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>

                                    <?php }
                                    }
                                    ?>



                                </select>
                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>تاريخ إنشاء الشركة</label>
                                <input type="text" name="created_at" required class="form-control" value="<?php echo $row['created_at']; ?>">
                            </div>

                        </div>
                        <div class="clear"></div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>وقت عمل الشركة</label>
                               <input type="text" name="working_time" class="form-control" value="<?php echo $row['working_time'] ;?>" >
                            </div>

                        </div>

                        <div class="clear"></div>

                        <div class="col-xs-4 col-sm-12 col-md-12">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label>خلفية الشركة:</label>
                                <textarea name="co_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل خلفية الشركة" style="height: 200px;"><?php echo $row['co_background']; ?></textarea>
                            </div>

                        </div>
                        <div class="col-xs-4 col-sm-12 col-md-12">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label> الرؤية:</label>
                                <textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الرؤية" style="height: 200px;"><?php echo $row['vision']; ?></textarea>
                            </div>

                        </div>
                        <div class="col-xs-4 col-sm-12 col-md-12">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label> الهدف:</label>
                                <textarea name="goal" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الهدف" style="height: 200px;"><?php echo $row['goal']; ?></textarea>
                            </div>

                        </div>

                        <div class="clear"></div>
                       

                    </div>

                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary" name="update_company">تعديل</button>
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
            $query=mysqli_query($con,"call get_company('$id');");
            if (mysqli_num_rows($query)>0) {
             echo   ' <a data-bs-toggle="modal" href="#QualifModal" class="btn btn-primary" hidden > اضافة بيانات الشركة</a>';
            }else{
                
             echo   ' <a data-bs-toggle="modal" href="#QualifModal" class="btn btn-primary"  > اضافة بيانات الشركة</a>';
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
                <form action="../server/company/add_company.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="row gap-20 modalbody">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>اسم الشركة</label>
                                <input name="co_name" required type="text" class="form-control" value="" placeholder="ادخل اسم الشركة ">
                            </div>

                        </div>


                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>نشاط الشركة</label>
                                <input type="text" name="activity" required class="form-control" value="" placeholder="على سبيل المثال مثل :الحجز ,السفر">
                            </div>

                        </div>

                        <div class="clear"></div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>الموقع الإلكتروني</label>
                                <input type="text" name="website" required class="form-control" value="" placeholder=" أدخل العنوان ">
                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>رقم هاتف الموارد البشرية</label>
                                <input type="text" name="hr_phone" required class="form-control" value="">
                            </div>

                        </div>

                        <div class="clear"></div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>المنطقة</label>
                                <select class="form-control" name="region_id" id="">
                                    <option selected value="">المنطقة</option>
                                    <?php
                                    require "../connection.php";
                                    $query = mysqli_query($con, "select * from region;");
                                   
                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                    <?php }
                                    
                                    mysqli_close($con); ?>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>تاريخ إنشاء الشركة</label>
                                <input type="text" name="created_at" required class="form-control" value="">
                            </div>

                        </div>
                        <div class="clear"></div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">
                                <label>وقت عمل الشركة</label>
                                <input type="text" name="working_time" >
                            </div>

                        </div>
                        <div class="clear"></div>

                        <div class="col-xs-4 col-sm-12 col-md-12">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label>خلفية الشركة:</label>
                                <textarea name="co_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل خلفية الشركة" style="height: 200px;"></textarea>
                            </div>

                        </div>
                        <div class="col-xs-4 col-sm-12 col-md-12">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label> الرؤية:</label>
                                <textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الرؤية" style="height: 200px;"></textarea>
                            </div>

                        </div>
                        <div class="col-xs-4 col-sm-12 col-md-12">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label> الهدف:</label>
                                <textarea name="goal" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الهدف" style="height: 200px;"></textarea>
                            </div>

                        </div>

                        <div class="clear"></div>
                        <div class="col-sm-6 col-md-6">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label>الضمانات</label>
                                <input class="form-control choose-img" accept="image/*" type="file" name="garantee" required>
                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                <label>شعار الشركة</label>
                                <input class="form-control choose-img" accept="image/*" type="file" name="co_logo" required>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary" name="add_company">حفظ</button>
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