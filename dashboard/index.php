<?php
require "../config.php";
if (isset($_GET['status_no'])) {
	$id=$_GET['status_no'];
	$status=$_GET['status'];
	$query=mysqli_query($con,"update review set status=$status where id=$id");
	header("location:index.php");
}
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
if ($page <= 1 || $page) {
	$page = 1;
	$page1 = 0;
} else {
	$page1 = ($page * 5) - 5;
}

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>crud dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/report.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome-all.min.js"></script>
	<script src="js/form-jquery.js" type="text/javascript"></script>
	<script src="js/main-js.js"></script>
	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>



	<div class="wrapper">

		<div class="body-overlay"></div>

		<!-------sidebar--design------------>

		<div id="sidebar">
			<div class="sidebar-header">
				<h3><img src="../img/logo.png" class="img-fluid" /><span>forsh</span></h3>
			</div>
			<ul class="list-unstyled component m-0">
				<li class="active">
					<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
				</li>

				<li class="">
					<a href="users.php" class="dashboard"><i class="material-icons">person</i>manage users </a>
				</li>


				<li class="">
					<a href="company.php" class="dashboard"><i class="material-icons">store</i> manage companies</a>
				</li>

				<li class="">
					<a href="jobseeker.php" class="dashboard"><i class="material-icons">badge</i>manage jobseeker </a>
				</li>


				<li class="">
					<a href="jobs.php" class="dashboard"><i class="material-icons">work</i>manage jobs </a>
				</li>
				<?php if ($role == '3') {


					echo    '<li class="">
					<a href="role.php" class="dashboard"><i class="material-icons">dashboard</i>roles and privileges </a>
				</li>';
				} ?>
				<li class="">
					<a href="notification.php" class="dashboard"><i class="material-icons">notifications</i>manage notification </a>
				</li>

				<li class="">
					<a href="region.php" class="dashboard"><i class="material-icons">dashboard</i>manage regions </a>
				</li>


				<li class="">
					<a href="category.php" class="dashboard"><i class="material-icons">category</i>manage category </a>
				</li>
				<li class="">
					<a href="country.php" class="dashboard"><i class="material-icons">dashboard</i>manage country </a>
				</li>

				<li class="">
					<a href="feedback.php" class="dashboard"><i class="material-icons">comment</i>manage feedback </a>
				</li>

			</ul>
		</div>

		<div id="content">

			
		
<!-------navbar--design------------>
			<div class="top-navbar">
				<div class="xd-topbar">
					<div class="row">
						<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
							<div class="xp-menubar">
								<span class="material-icons text-white">signal_cellular_alt</span>
							</div>
						</div>

						<div class="col-md-5 col-lg-3 order-3 order-md-2">
							
						</div>

						<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
							<div class="xp-profilebar text-right">
								<nav class="navbar p-0">
									<ul class="nav navbar-nav flex-row ml-auto">
										<li class="dropdown nav-item active">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<span class="material-icons">notifications</span>
												<?php require "../connection.php";
												 $query=mysqli_query($con,"select * from notification where users=$role OR users=''");
													$num=mysqli_num_rows($query);
												?>
												<span class="notification"><?php echo $num; ?></span>
											</a>
											<ul class="dropdown-menu">
												<?php while ($row=mysqli_fetch_assoc($query)) { ?>
												<li><a href="#"><?php echo '<h5>'.$row['title'].'</h5>'.$row['text'] ;?></a></li><hr>
												<?php }?>
											</ul>
											
										</li>

										<li class="nav-item">
											<a class="nav-link" href="feedback.php">
												<?php require "../connection.php";
												$feedback = mysqli_query($con, "select * from feedback where replay='';");
												while ($feed = mysqli_fetch_assoc($feedback)) {
													$num = mysqli_num_rows($feedback);
												?>
													<span class="material-icons">question_answer</span>
													<span class="notification"><?php echo $num; ?></span>
												<?php } ?>
											</a>
										</li>

										<li class="dropdown nav-item">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<?php $img = mysqli_query($con, "select image from user where id =$id");
												$user = mysqli_fetch_assoc($img); ?>
												<img src="<?php echo 'data:image/png;base64 ,' . base64_encode($user['image']) ?> " style="width:40px; border-radius:50%;" />
												<span class="xp-user-live"></span>
											</a>
											<ul class="dropdown-menu small-menu">

												<li><a href="../auth/sign_out.php">
														<span class="material-icons">logout</span>
														Logout
													</a></li>

											</ul>
										</li>


									</ul>
								</nav>
							</div>
						</div>

					</div>

					<div class="xp-breadcrumbbar text-center">
						<h4 class="page-title">Dashboard</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">forsah</a></li>
							<li class="breadcrumb-item active" aria-curent="page">control panel</li>
						</ol>
					</div>


				</div>
			</div>

<!-------body--design------------>
<?php require "../connection.php";
$report=mysqli_query($con," SELECT * FROM `jobseekers_reqruitment_companies`");
while ($num=mysqli_fetch_assoc($report)) {
	

?> 
<div class="row" >
<div class="col-lg-3 report">
<h4>Jobseekers</h4>
<ul class="report_item">
	<li class="icon"><span class="material-icons">store</span></li>
	<li><?php echo $num['Jobseeker_no'] ?></li>
</ul>
</div>

<div class="col-lg-3 report">
<h4>Companies</h4>
<ul class="report_item">
	<li class="icon"><span class="material-icons">store</span></li>
	<li><?php echo $num['Company_No'] ?></li>
</ul>
</div>

<div class="col-lg-4 report">
<h4>Accepted Applicants</h4>
<ul class="report_item">
	<li class="icon"><span class="material-icons">store</span></li>
	<li><?php echo $num['Accepted_Applications_No'] ?></li>
</ul>
</div>
</div>
<?php }?>
<div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">

                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                        <h2 class="ml-lg-2">Manage reviews</h2>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>id</th>
                                        <th>user Name</th>
                                        <th  >Review</th>
                                        <th>active</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                   
                                    require "../connection.php";
                                    
                                    $query = mysqli_query($con, "select * from review_list limit $page1,5");
                                    $num=mysqli_num_rows($query);
                                    while ($row = mysqli_fetch_assoc($query)) {

                                    ?>
                                        <tr>
                                            <th><?php echo $row['id']; ?></th>
                                            <th><?php echo $row['username']; ?></th>
                                            <th class="review"><?php echo $row['review']; ?></th>
                                            
                                            
                                            <?php if ($row['status'] == 1) {
                                                echo '<th><a href="?status_no=' . $row['id'] . '&status=0 "   style=" background-color: yellow; ">un_post</a></th>';
                                            } elseif ($row['status'] == 0) {
                                                echo '<th><a href="?status_no=' . $row['id'] . '&status=1"  style=" background-color: rgb(23, 149, 199); ">post</a></th>';
                                            } else {
                                                echo '<th><a href=""  style=" background-color: red; ">block</a></th>';
                                            } ?>
											</th>
                                        </tr>
										<?php } ?>
                                </tbody>


                            </table>
                            <?php
                           
                            $res = mysqli_query($con, "select * from review ");
                            $count=mysqli_num_rows($res) ;
                            $a=$count/5;
                            $a=ceil($a);
                          echo  '<div class="clearfix">
                            <div class="hint-text">showing <b>'.$num.'</b> out of <b>'.$count.'</b></div>
                            <ul class="pagination">
                            <li class="page-item disabled"><a href="?page=' . $page-1 . '">Previous</a></li>';
                           for ($i=1; $i <=$a ; $i++) { 
                            if ($i==$page) {
                               echo '<li class="page-item active "><a href="?page='.$i.' " class="page-link"> '.$i.' </a></li>';
                            }else {
                                echo '<li class="page-item  "><a href="?page='.$i.' " class="page-link"> '.$i.'</a></li>';
                            }
                        }
                            ?> 
                            
                            <li class="page-item "><a href="?page=<?php echo $page+1; ?>" class="page-link">Next</a></li>
                            </ul>
                            </div>


                        </div>
                    </div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function() {
			$(".xp-menubar").on('click', function() {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function() {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});

		});
	</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const reviewCells = document.querySelectorAll('.review');
        reviewCells.forEach((cell) => {
            cell.addEventListener('click', function () {
                // Toggle between expanded and collapsed states
                cell.classList.toggle('expanded');
            });
        });
    });
</script>



</body>

</html>