<?php
require "config.php";

    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
       
        <script src="js/jquery-3.3.1.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
   
 
<link rel="stylesheet" href="dashboard/css/custom.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="css/line-icons.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/card.css">
        <link rel="stylesheet" href="css/jobs.css">
        <link rel="stylesheet" href="css/preloader.css">

        
        
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
                                            echo '<li class="nav-item"><a class="nav-link mx-lg-2" href="main/companies.php"><h5>الشركات</h5></a></li>';
                                            echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="company/profile.php"><h5>الملف الشخصي</h5></a></li>';
                                            
                                            
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
                                             echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="main/jobs.php"><h5>قائمة الوظائف</h5></a></li>';
                                             echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="jobseeker/profile.php"><h5>الملف الشخصي</h5></a></li>';
                                            
                                           }
                                           
                                    }else {
                                        echo'<li class="nav-item"><a class="nav-link mx-lg-2" href="main/jobs.php"><h5>قائمة الوظائف</h5></a></li>';
                                        echo '<li class="nav-item"><a class="nav-link mx-lg-2" href="main/companies.php"><h5>الشركات</h5></a></li>';
                                        
                                      }
                                    
                         
                          ?> 
                         
                         <li class="nav-item"><a class="nav-link mx-lg-2 active" aria-current="page"
                                    href="index.php"><h5>الرئيسية</h5></a></li>
                        </ul>
                        <?php
                        if (isset($id)) {
                            echo'<a href="auth/sign_out.php" class="login-button">تسجيل خروج</a>';
                        }else{
                            echo '<a href="auth/register.php" class="login-button">تسجيل دخول</a>';
                        }
                        ?> 
                    </div>

                </div>

                <button id="r" class="navbar-toggler" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
<div dir="rtl" >
      


        <!--hero-->
        <section id="home" class="bg-cover hero-section" style="background-image: url(img/cover1.jpg);">
            <div class="overlay"></div>
            <div class="container text-white text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-4" data-aos="zoom-in">انت في المكان المناسب<br>لإيجاد الوظيفة او الموهبة المناسبة<br>
                        </h1>
                        <p>إنشى حساب واستمتع بخدمات المنصة </p>
                        <?php if (!isset($id)) {
                            echo '<a href="auth/register.php" id="hello" data-aos="fade-up" class="btn"  >انطلق</a>';
                        } ?>

                    </div>
                </div>
            </div>
        </section>
        <!--services-->
        <section id="services" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-intro text-center" data-aos="fade-up">
                        <h1>الخدمات</h1>
                        <div class="divider"></div>
                        <p>تُقدم لكم منصة [فرصة] تجربة فريدة من نوعها في عالم خدمات التوظيف الإلكترونية، حيث تم تصميمها لتلبية احتياجاتكم المتنوعة بمنتهى السهولة والسرعة والكفاءة.

</p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-4" data-aos="zoom-in">
                        <div class="service">
                            <div class="service-img"><img src="img/image_1.jpg" alt="">
                                <div class="icon"><i class="icon-search"></i></div>
                            </div>
                            <h5 class="mt-5 pt-4">البحث عن وظيفة</h5>
                            <p>نوفر لك إمكانية الوصول إلى آلاف الوظائف الشاغرة في مختلف المجالات والقطاعات، وذلك من خلال التعاون مع كبرى الشركات والمؤسسات في منطقتك.
محرك بحث ذكي: يمكنك البحث عن الوظائف بسهولة ودقة باستخدام محرك البحث الذكي الخاص بنا، والذي يسمح لك بتحديد معايير البحث مثل:المنطقة، التخصص ، ونوع الدوام</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="zoom-in">
                        <div class="service">
                            <div class="service-img"><img src="img/image_2.jpg" alt="">
                                <div class="icon"><i class="icon-printer"></i></div>
                            </div>
                            <h5 class="mt-5 pt-4">نشر وظيفة</h5>
                            <p>نُتيح لك نشر وظائفك أمام آلاف الباحثين عن عمل من مختلف المجالات والتخصصات، وذلك من خلال شبكتنا الواسعة من المستخدمين.
يمكنك استهداف جمهورك المُناسب بدقة من خلال تحديد معايير البحث مثل
،المهارات المطلوبة،
 المؤهلات الدراسية،الخبرة كما يمكنك استعراض بيانات المتقدمين للوظيفه واختيارالمناسب</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="zoom-in">
                        <div class="service">
                            <div class="service-img"><img src="img/image_3.jpg" alt="">
                                <div class="icon"><i class="icon-megaphone"></i></div>
                            </div>
                            <h5 class="mt-5 pt-4">ترسيخ العلامة التجارية</h5>
                            <p>تلعب منصة "فرصه" دورًا هامًا في نشر رؤية الشركة وأهدافها،
مما يُساهم بشكل كبير في ترسيخ علامتها التجارية
  وجعلها أكثر تميزًا في سوق العمل ، خاصة الشركات حديثة النشأة حيث يصل اسم هذه الشركه للعديد من المستخدمين ذوي الخبرات والمؤهلات ويذاع صيتها بين الشركات ممايسهل عليها الكثير من التعاملات في الجانب العملي </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--about-->
        <section id="about" class="bg-cover" style="background-image: url(img/cover_4.jpg); ">
            <div class="overlay"></div>
            <div class="container text-white text-center">
                <div class="row">
                    <div class="col-12 section-intro text-center" data-aos="fade-up">
                        <h1>شاهد الفيديو</h1>
                        <div class="divider"></div>
                        <h5>لمعرفة المزيد عن منصة فرصة وخدماتها <br> وطريقة استخدامها شاهد هذا الفيديو
                    </h5><a href="#" class="video-btn"><i class='bx bx-play'></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!--features-->
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
        <!--counters-->
        <section class="bg-cover" style="background-image: url(img/cover_2.jpg);">
            <div class="overlay"></div>
            <div class="container text-white text-center">
                <div class="row gy-4" data-aos="fade-up">
                    <?php
                    $report=mysqli_query($con,"SELECT * FROM `jobseekers_reqruitment_companies`");
                   while ($counter=mysqli_fetch_assoc($report)) {
                   
                   
                    ?>
                    <div class="col-md-3"><i class="fa fa-user h1"></i>
                        <h1 class="mt-3 mb-2"><?php echo $counter['Jobseeker_no']; ?>
                        </h1>
                        <p>الباحثين عن عمل</p>
                    </div>
                    <div class="col-md-3"><i class="fa fa-hourglass h1"></i>
                        <h1 class="mt-3 mb-2"><?php echo $counter['job_No']; ?></h1>
                        <p>الوظائف</p>
                    </div>
                    <div class="col-md-3"><i class="fa  fa-building h1"></i>
                        <h1 class="mt-3 mb-2"><?php echo $counter['Company_No']; ?></h1>
                        <p>الشركات</p>
                    </div>
                    <div class="col-md-3"><i class="fa fa-handshake h1"></i>
                        <h1 class="mt-3 mb-2"><?php echo $counter['Accepted_Applications_No']; ?></h1>
                        
                        <p>الاشخاص المقبولين</p>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>
        <!--companies-->
    <section id="companies" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-intro text-center">
                        <h1>الشركات</h1>
                        <div class="divider"></div>
                        <p>في فرصة، نحن ملتزمون بربط الأفراد الموهوبين مع الشركات الاستثنائية.
                             نحن فخورون بالشراكة مع بعض المنظمات الرائدة، التي تقدم مجموعة واسعة من الفرص الوظيفية عبر الصناعات المتنوعة. عندما تنضم إلى شركة من خلال فرصة، يمكنك أن تكون واثقًا من أنك تبدأ حياتك المهنية مع مؤسسة تقدر موظفيها وتلتزم بنجاحك. </p>
                    </div>
                </div>
                <div class="row g-4 text-start">

                    <?php 
                    $sql = "select * from company_list;";
                    $query = mysqli_query($con, $sql);
                    if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <div class="col-md-4" data-aos="fade-up">

                            <div class="review p-4">
                                <a href="main/company_details.php?id=<?php echo $row['id']; ?>">

                                    <div class="person">
                                        
                                        <img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['co_logo']) ?> ">
                                        <div class="text " style="margin-right: 10px;" >
                                            <h6 class=""><i class="fa fa-building text-primary me-2"></i>
                                                <?php echo $row['co_name']; ?>
                                            </h6><i class="fa fa-map-marker-alt text-primary me-2"></i><small>
                                                <?php echo $row['region_name']; ?>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <p class="pt-4" style="text-align: start;" >
                                     تم إنشاء <?php echo $row['co_name']; ?> عام <?php echo $row['created_at']; ?> ,وهي متخصصة في <?php echo $row['activity']; ?> 
                                     يقع مقرها الرئيسي في <br><?php echo $row['region_name']; ?> - <?php echo $row['user_address']; ?> 
                                </p>

                            </div>

                        </div>
                    <?php }} ?>



            </div>
        </div>

    </section>
    <!--review-->
    <section id="reviews" class="bg-light"  >
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>اراء المستخدمين</h1>
                    <div class="divider"></div>
                    <p>نحن فخورون جدًا بالعمل الذي نقوم به هنا في فرصة، ونحن فخورون أكثر بالتأثير
                         الذي أحدثناه على عملائنا. ولكن لا تأخذ كلمتنا فقط. أنظر ماذا يقول عملاؤنا عنا</p>
                </div>
            </div>
            <div class="row text-start ">
                <?php $query=mysqli_query($con,"select * from review_view");
                while ($row=mysqli_fetch_assoc($query)) {
                   
              ?>
                <div class="col-md-4 " data-aos="fade-up">
                    <div class="card">
                        <div class="box1"></div>
                        <div class="img-area"><img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['image']) ?> " alt=""></div>
                        <div class="main-text  ">
                            <h2> <?php echo $row['username'] ;?></h2>
                            <p><?php echo $row['review'] ;?></p>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!--contact-->
    <section id="contact" class="bg-cover text-white" style="background-image: url(img/cover_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>ابقى على تواصل معنا</h1>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto" data-aos="fade-up">
                    <form action="#" class="row g-4">
                        <div class="form-group col-md-6"><input type="text" class="form-control"
                                placeholder="الاسم"></div>
                        <div class="form-group col-md-6"><input type="email" class="form-control"
                                placeholder="الايميل الخاص بك"></div>
                        <div class="form-group col-md-12"><input type="text" class="form-control" placeholder="عنوان الرسالة">
                        </div>
                        <div class="form-group col-md-12"><textarea name="" id="" cols="30" rows="4"
                                class="form-control" placeholder="نص الرسالة"></textarea></div>
                        <div class="text-center"><button class="btn" type="submit" id="hello">إرسال الرسالة </button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Back to Top -->
    <a href="#" id="hello" class="btn btn-lg  btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!--footer-->



    <footer class=" text-white pt-4 "  >
      <div class="container text-center text-md-start">
        <div class="row" >
            <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
            
            <img src="img/logof.png" alt="" style="height: 50px; width: 70px; " >
                <p>فرصه عبارة عن منصة توظيف تربط بين الاشخاص المؤهلين والوظائف المناسبه بهدف تحسين وتطوير عملية التوظيف في اليمن.</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-md-0 mb-4">
                <h5>ABOUT US</h5>
               <a href="#features"> <h6 class="text-uppercase fw-bold pb-2 ">Features</h6></a>
               <a href="#services"> <h6 class="text-uppercase fw-bold pb-2">Services</h6></a>
               <a href="#about"> <h6 class="text-uppercase fw-bold pb-2">About</h6></a>
               <a href="#reviews"> <h6 class="text-uppercase fw-bold ">Testitionals</h6></a>
              
            </div>
            
            <div class="col-md-6 col-lg-4 col-xl-3 mx-auto mb-md-0 mb-4">
            <h5>CONTACT US</h5>
            <p><i class="bi bi-mail me-2"></i><a href="main/contact.php">Get in Touch</a></p>
            <?php if (isset($id)) {
               echo '<a href="#review" data-toggle="modal">share review</a>';
            } ?>
            

                <p><i class="bi bi-telephone me-2"></i>Phone: +123456789</p>
                <p><i class="bi bi-envelope me-2"></i>www.forsah2024@gmail.com</p>
            </div>
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
    <script src="js/app.js"></script>
<script src="js/preloader.js"></script>


  </script>
</body>

</html>