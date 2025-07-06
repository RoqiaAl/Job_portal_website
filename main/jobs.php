
<?php
require "../config.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
       
        <script src="../js/jquery-3.3.1.min.js"></script>
    
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
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
        <?php
    require "../connection.php";
    if (isset($_GET['j_id']) && isset($id)) {
        $j_id = $_GET['j_id'] ;
        $query = mysqli_query($con, "CALL apply_job('$id', '$j_id')");
    
        $mess = mysqli_fetch_assoc($query);
    
        echo "<script>
            swal({
                title: 'Hello',
                text: '{$mess['message']}',
                icon: 'info'
            });
        </script>";
    } elseif(isset($_GET['j_id'])&& !isset($id)) {
        echo "<script>
            swal({
                title: 'Information',
                text: 'يجب تسجيل الدخول للتقديم على الوظائف',
                icon: 'info'
            });
        </script>";}
    ?>
   
     
   


        <!-- Jobs End --> <div id="job" class="container-fluid  mb-2  wow fadeup" data-wow-delay="0.1s" style="padding: 35px; background: rgba(160, 169, 170, 0.7); margin-top: 65px;">
            <div class="container" style="background: rgba(11, 92, 255, 1);">
                <form action="job_filter.php" method="post">
                    <div class="row g-2">

                        <div class="col-md-10">
                            <div class="row g-2 " style="margin-top: 1px; margin-bottom: 22px;">
                                <div class="col-md-4">
                                    <select class="form-select border-0" name="region_id">
                                        <option selected value="">المنطقة</option>
                                        <?php
                                        require '../connection.php';
                                        $stmt = mysqli_query($con, "select * from region;");
                                        if (mysqli_num_rows($stmt) > 0) {
                                            while ($cat = mysqli_fetch_assoc($stmt)) { ?>
                                                <option 
                                                         value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>

                                        <?php }
                                        }
                                        mysqli_close($con); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select border-0" name="category_id">
                                        <option selected value="">القسم</option>
                                        <?php
                                        require '../connection.php';
                                        $stmt = mysqli_query($con, "select * from category;");
                                        if (mysqli_num_rows($stmt) > 0) {
                                            while ($cat = mysqli_fetch_assoc($stmt)) { ?>
                                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>

                                        <?php }
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="working_time" class="form-select border-0">
                                        <option selected value="">وقت الدوام</option>
                                        <option  value="full_time"> دوام كامل</option>
                                        <option  value="part_time">نصف دوام</option>
                                        <option value="online">online</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input id="hello" type="submit" style="border: 1px solid white;" name="search_job" value="search" class="btn  w-100">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->




        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">


                <?php
                require "../connection.php";
                $query = mysqli_query($con, "select * from job_list;");
                if (mysqli_num_rows($query) > 0) {

                    while ($row = mysqli_fetch_assoc($query)) {

                ?>

                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-10 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['co_logo']) ?> " alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <a href="job_details.php?id=<?php echo $row['id']; ?>">
                                            <h5 class="mb-3"> <?php echo $row['title']; ?></h5>
                                        </a>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['region_name']; ?></span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['working_time']; ?></span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['salary']; ?></span>
                                        <span class="text-truncate me-3"><i class="far fa-user text-primary me-2"></i>required_number: <?php echo $row['req_no']; ?></span>
                                        <span class="text-truncate me-0"><i class="fas fa-briefcasee text-primary me-2"></i><?php echo $row['exp_period']; ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">

                                    <a id="hello" class="btn " href="?j_id=<?php echo $row['id']; ?>">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>انتهاء التقديم: <?php echo $row['date_line']; ?></small>
                                </div>
                            </div>
                        </div>
                <?php }
                }else {
                    echo '<div class="job-item p-4 mb-4">
                    <div class="row g-4">
                       <h1 style="text-align:right;">!  لايوجد وظائف  حاليا </h1>
                       
                    </div>
                    </div>';
                } ?> 


            </div>
        </div>
        <!-- Jobs End -->



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


    <!-- JavaScript Libraries -->
   

   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    
    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script src="../js/preloader.js"></script>
</body>

</html>