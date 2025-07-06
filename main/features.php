<?php require "../config.php"; ?>
<!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
       
        <script src="../js/jquery-3.3.1.min.js"></script>
    
    <script src="../js/bootstrap.min.js"></script>
    
 
<link rel="stylesheet" href="../dashboard/css/custom.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/line-icons.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/card.css">
        <link rel="stylesheet" href="../css/jobs.css">
        <link rel="stylesheet" href="../css/preloader.css">

        
        
        <title>homepage</title>
    </head>

    <body data-bs-spy="scroll" data-bs-target=".navbar">

    <div id="preloader"></div>
        <!--navbar-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white">
            <div class="container-fluid"><a class="navbar-brand me-auto" href="#" style="color:  #0b5cff;">FORSAH</a>
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
                                            echo '<li class="nav-item"><a class="nav-link mx-lg-2" href="companies.php"><h5>الشركات</h5></a></li>';
                                            echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="../company/profile.php"><h5>الملف الشخصي</h5></a></li>';
                                            
                                            
                                           }
                                           elseif (!empty($id)&&$role=='1') {
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
                                             echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="jobs.php"><h5>قائمة الوظائف</h5></a></li>';
                                             echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="../jobseeker/profile.php"><h5>الملف الشخصي</h5></a></li>';
                                            
                                           }
                                           
                                    }else {
                                        echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="jobs.php"><h5>قائمة الوظائف</h5></a></li>';
                                        echo '<li class="nav-item"><a class="nav-link mx-lg-2" href="companies.php"><h5>الشركات</h5></a></li>';
                                        
                                      }
                                    
                         
                          ?> 
                         
                         <li class="nav-item"><a class="nav-link mx-lg-2 active" aria-current="page"
                                    href="../index.php"><h5>الرئيسية</h5></a></li>
                        </ul>
                        <?php
                        if (isset($id)) {
                            echo'<a href="../auth/sign_out.php" class="login-button">تسجيل خروج</a>';
                        }else{
                            echo '<a href="../auth/register.php" class="login-button">تسجيل دخول</a>';
                        }
                        ?> 
                    </div>

                </div>

                <button id="r" class="navbar-toggler" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
        
        <section id="features" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-intro text-center" data-aos="fade-up">
                        <h1>مميزاتنا</h1>
                        <div class="divider"></div>
                        <p> </p>
                    </div>
                </div>
                <div class="row gx-4 gy-5">
                    <div class="col-md-4 feature" data-aos="fade-up">
                        <div class="icon"><i class="icon-clock"></i></div>
                        <h5 class="mt-4 mb-3">توفير الوقت</h5>
                        <p>توفر منصة فرصةالعديد من الميزات التي تُساعد المستخدمين، سواء كانوا باحثين عن عمل
أو أصحاب عمل، على توفير الوقت والجهد
في عملية البحث عن الوظائف المناسبة أو المرشحين الملائمين </p>
                    </div>
                    <div class="col-md-4 feature" data-aos="fade-up">
                        <div class="icon"><i class="icon-cloud"></i></div>
                        <h5 class="mt-4 mb-3">تخزين سيرتك الذاتية الكترونيا </h5>
                        <p>سهولة الوصول والتحديث :يمكنك تحديث سيرتك الذاتية بسهولة بإضافة معلومات جديدة أو تعديل المعلومات الموجودة، لضمان أن سيرتك الذاتية تُعكس مهاراتك وخبراتك بشكل دقيق، التقديم للوظائف بنقرة واحدة  بمجرد تخزين سيرتك الذاتية، يمكنك التقديم للوظائف بنقرة واحدة دون الحاجة إلى إعادة إدخال معلوماتك في كل مرة
                        </p>
                    </div>
                    <div class="col-md-4 feature" data-aos="fade-up">
                        <div class="icon"><i class="icon-circle-compass"></i></div>
                        <h5 class="mt-4 mb-3">نوجهك للوصول إلى حلمك</h5>
                        <p>هدف فرصة إلى أن تكون مصدرًا مفيدًا من خلال توفير الأدوات والمعلومات اللازمة للتنقل في بحثك عن وظيفة. يمكن أن تكون فرصة بمثابة مركزك الشامل للعثور على مهنة أحلامك. يمكننا إرشادك خلال عملية البحث وربطك بالفرص المناسبه

                        </p>
                    </div>
                    <div class="col-md-4 feature" data-aos="fade-up">
                        <div class="icon"><i class="icon-mobile"></i></div>
                        <h5 class="mt-4 mb-3">تصميم متجاوب لجميع الشاشات</h5>
                        <p>يضمن تصميم فرصة إمكانية وصول الجميع إلى بوابة الوظائف بغض النظر عن أجهزتهم. يضمن نظام RWD الخاص بنا أن يقوم موقع الويب تلقائيًا بضبط تخطيطه ومحتواه ليناسب حجم شاشة الجهاز المستخدم (سطح المكتب أو الجهاز اللوحي أو الهاتف الذكي).
                        </p>
                    </div>
                    <div class="col-md-4 feature" data-aos="fade-up">
                        <div class="icon"><i class="icon-shield"></i></div>
                        <h5 class="mt-4 mb-3">الأمان</h5>
                        <p>يتم تشفير المعلومات الحساسة مثل السير الذاتية وتفاصيل الاتصال لمنع الوصول للبيانات في حالة اختراقها وضمان
                            .  ssl اتصال آمن بين متصفحك وبوابة الوظائف، مما يحمي نقل البيانات باستخدام
                        </p>
                    </div>
                    <div class="col-md-4 feature" data-aos="fade-up">
                        <div class="icon"><i class="icon-strategy"></i></div>
                        <h5 class="mt-4 mb-3">نظام تتبع حالة التقديم للوظيفة</h5>
                        <p> تُقدم المنصة للمُتقدم لوحة معلومات خاصة به تُتيح له عرض حالة جميع طلبات التوظيف التي قدمها.
 يمكن للمُتقدم معرفة مراحل سير طلبه، مثل ما إذا كان قد تم استلام طلبه أو مراجعته أو دعوته للمقابلة.
 يتلقى المُتقدم تنبيهات بالبريد الإلكتروني  بخصوص أي تحديثات على حالة طلبه.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Back to Top -->
   
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
               <a href="features.php"> <h6 class="text-uppercase fw-bold pb-2 ">Features</h6></a>
               <a href="services.php"> <h6 class="text-uppercase fw-bold pb-2">services</h6></a>
               <a href="about.php"> <h6 class="text-uppercase fw-bold pb-2">about</h6></a>
               <a href="reviews.php"> <h6 class="text-uppercase fw-bold ">testitionals</h6></a>
              
            </div>
            
            <div class="col-md-6 col-lg-4 col-xl-3 mx-auto mb-md-0 mb-4">
            <p><a href="contact.php">get in touch</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../js/app.js"></script>
<script src="../js/preloader.js"></script>
   

  </script>
</body>

</html>