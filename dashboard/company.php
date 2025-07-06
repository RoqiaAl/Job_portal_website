<?php
require "../config.php";

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
				<h3><img src="img/logo.png" class="img-fluid" /><span>forsh</span></h3>
			</div>
			<ul class="list-unstyled component m-0">
				<li class="">
					<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
				</li>

				<li class="">
					<a href="users.php" class="dashboard"><i class="material-icons">person</i>manage users </a>
				</li>


				<li class="active">
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

		<!-------sidebar--design- close----------->



		<!-------page-content start----------->

		<div id="content">

			<!------top-navbar-start----------->

			<div class="top-navbar">
				<div class="xd-topbar">
					<div class="row">
						<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
							<div class="xp-menubar">
								<span class="material-icons text-white">signal_cellular_alt</span>
							</div>
						</div>

						<div class="col-md-5 col-lg-3 order-3 order-md-2">
							<div class="xp-searchbar">
								<form method="post" action="filter_company.php">
									<div class="input-group">
										<input type="search" name="search_value" class="form-control" placeholder="Search">
										<div class="input-group-append">
											<button class="btn" name="search_word" type="submit" id="button-addon2">Go
											</button>
										</div>
									</div>
								</form>
							</div>
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
			<!------top-navbar-end----------->


			<!------main-content-start----------->



			<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title">
								<div class="row">
									<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Manage companies</h2>
									</div>
									<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<?php if ($role == 3) {
											echo '<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
										<i class="material-icons">&#xE147;</i>
										<span>Add New company</span>
										</a>';
										} ?>


									</div>
								</div>
							</div>

							<table class="table table-striped table-hover">
								<thead>
									<tr>

										<th>id</th>
										<th>Name</th>
										<th>Email</th>
										<th>Address</th>
										<th>hr_phone</th>
										<?php if ($role == '3') {
										?>
											<th>garantee</th>
										<?php } ?>
										<th>jobs</th>
										<th>status</th>
										<th style="text-align: center;" >Actions</th>

									</tr>
								</thead>

								<tbody  >

									<?php
									
									$query = mysqli_query($con, "select * from company_view limit $page1,5");
									$num = mysqli_num_rows($query);
									while ($row = mysqli_fetch_assoc($query)) {

									?>
										<tr  >
											<th><?php echo $row['id']; ?></th>
											<th><?php echo $row['co_name']; ?></th>
											<th><?php echo $row['email']; ?></th>
											<th><?php echo $row['name']; ?></th>
											<th><?php echo $row['hr_phone']; ?></th>

											<?php if ($role == '3') {

											?>

												<th> <a href="garantee.php?id=<?php echo $row['id']; ?>">
														<i class="material-icons" data-toggle="tooltip" title="view company details">visibility</i></a>

													<a href="?update_garantee=<?php echo $row['id']; ?>" class="edit">
														<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

												</th>
											<?php } ?>



											<th><a href="../company/my-jobs.php?<?php echo $row['id']; ?>">view</a></th>
											<th>
													<div class="col-lg-4">
														<?php if ($row['status'] == 1) {
															echo '<a href="company_crud.php?status_no=' . $row['id'] . '&status=0 "   style=" background-color: yellow; ">reject</a>';
														} else {
															echo '<a href="company_crud.php?status_no=' . $row['id'] . '&status=1"  style=" background-color:rgb(23, 149, 199); ">accept</a>';
														}  ?>
													</div></th>
											<th>
												<div class="row"  >
													<div class="col-lg-4">
														<a href="../main/company_details.php?id=<?php echo $row['id']; ?>" class="edit">
															<i class="material-icons" data-toggle="tooltip" title="view company details">visibility</i></a>
													</div>




													<div class="col-lg-4">
														<a href="?edit_id=<?php echo $row['id']; ?>" class="edit">
															<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
													</div>

													

													


													

												</div>
											</th>
										</tr>
									<?php } ?>




								</tbody>


							</table>

							<?php

							$res = mysqli_query($con, "select * from compant ");
							$count = mysqli_num_rows($res);
							$a = $count / 5;
							$a = ceil($a);
							echo  '<div class="clearfix">
							<div class="hint-text">showing <b>' . $num . '</b> out of <b>' . $count . '</b></div>
							<ul class="pagination">
							<li class="page-item disabled"><a href="?page=' . $page - 1 . '">Previous</a></li>';
							for ($i = 1; $i <= $a; $i++) {
								if ($i == $page) {
									echo '<li class="page-item active "><a href="?page=' . $i . ' " class="page-link"> ' . $i . ' </a></li>';
								} else {
									echo '<li class="page-item  "><a href="?page=' . $i . ' " class="page-link"> ' . $i . '</a></li>';
								}
							}
							?>

							<li class="page-item "><a href="?page=<?php echo $page + 1; ?>" class="page-link">Next</a></li>
							</ul>
						</div>


						<!----add-modal start--------->
						<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Add company</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="company_crud.php" method="post" enctype="multipart/form-data">


											<div class="form-group">
												<label>اسم المستخدم</label>
												<select name="user_id" id="">
													<?php
													require "../connection.php";
													$query = mysqli_query($con, "select id , username from user_list where role_name='company' ");
													while ($row = mysqli_fetch_assoc($query)) {
													?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
													<?php } ?>

												</select>
											</div>



											<div class="form-group">
												<label>اسم الشركة</label>
												<input name="co_name" required type="text" class="form-control" value="" placeholder="ادخل اسم الشركة ">
											</div>






											<div class="form-group">
												<label>نشاط الشركة</label>
												<input type="text" name="activity" required class="form-control" value="" placeholder="على سبيل المثال مثل :الحجز ,السفر">
											</div>



											<div class="clear"></div>



											<div class="form-group">
												<label>الموقع الإلكتروني</label>
												<input type="text" name="website" required class="form-control" value="" placeholder=" أدخل العنوان ">
											</div>





											<div class="form-group">
												<label>رقم هاتف الموارد البشرية</label>
												<input type="text" name="hr_phone" required class="form-control" value="">
											</div>



											<div class="clear"></div>



											<div class="form-group">
												<label>المنطقة</label>
												<select class="form-control" name="region_id" id="">
													<option selected value="">select</option>
													<?php
													require "../connection.php";
													$query = mysqli_query($con, "select * from region");
													while ($row = mysqli_fetch_assoc($query)) {
													?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
													<?php } ?>

												</select>
											</div>




											<div class="form-group">
												<label>تاريخ إنشاء الشركة</label>
												<input type="text" name="created_at" required class="form-control" value="">
											</div>


											<div class="clear"></div>



											<div class="form-group">
												<label>وقت عمل الشركة</label>
												<input type="text" name="working_time">
											</div>


											<div class="clear"></div>



											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label>خلفية الشركة:</label>
												<textarea name="co_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل خلفية الشركة" style="height: 200px;"></textarea>
											</div>




											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label> الرؤية:</label>
												<textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الرؤية" style="height: 200px;"></textarea>
											</div>



											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label> الهدف:</label>
												<textarea name="goal" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الهدف" style="height: 200px;"></textarea>
											</div>



											<div class="clear"></div>


											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label>الضمانات</label>
												<input class="form-control choose-img" accept="image/*" type="file" name="garantee" required>
											</div>





											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label>شعار الشركة</label>
												<input class="form-control choose-img" accept="image/*" type="file" name="co_logo" required>
											</div>



									</div>


									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-success" name="add_company">Add</button>
									</div>
									</form>
								</div>
							</div>
						</div>

						<!----edit-modal end--------->





						<!----edit-modal start--------->
						<?php
								if (isset($_GET['edit_id'])) {
                        $id = $_GET['edit_id'];
                        $query = mysqli_query($con, "call get_company('$id');");
                        $row = mysqli_fetch_assoc($query);
                    ?>
					<div class="modal fade" tabindex="-1" id="edit" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit company</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								
									<form action="company_crud.php?id=<?php echo $id ;?>" method="post" >
									

									<div class="form-group">
										<label>اسم المستخدم</label>
										
										<?php
										require "../connection.php";
										$query=mysqli_query($con,"select id , username from user_list");
										while($cat=mysqli_fetch_assoc($query)){
											if ($row['id'] == $cat['id']){
										?>
                                                    <input disabled  value="<?php echo $cat['username']; ?>">
										<?php }}?>
                                             

										
									</div>

                                            
									<div class="form-group">
										<label>اسم الشركة</label>
										<input name="co_name" required type="text" class="form-control" value="<?php echo $row['co_name']; ?>" placeholder="ادخل اسم الشركة ">
									</div>






									<div class="form-group">
										<label>نشاط الشركة</label>
										<input type="text" name="activity" required class="form-control" value="<?php echo $row['activity']; ?>" placeholder="على سبيل المثال مثل :الحجز ,السفر">
									</div>



									<div class="clear"></div>



									<div class="form-group">
										<label>الموقع الإلكتروني</label>
										<input type="text" name="website" required class="form-control" value="<?php echo $row['website']; ?>" placeholder=" أدخل العنوان ">
									</div>





									<div class="form-group">
										<label>رقم هاتف الموارد البشرية</label>
										<input type="text" name="hr_phone" required class="form-control" value="<?php echo $row['hr_phone'] ;?>">
									</div>



									<div class="clear"></div>



									<div class="form-group">
										<label>المنطقة</label>
										<select class="form-control" name="region_id" id="">
											<option selected value="">المنطقة</option>
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




									<div class="form-group">
										<label>تاريخ إنشاء الشركة</label>
										<input type="text" name="created_at" required class="form-control" value="<?php echo $row['created_at'] ;?>">
									</div>


									<div class="clear"></div>



									<div class="form-group">
										<label>وقت عمل الشركة</label>
										<input type="text" name="working_time" value="<?php echo $row['working_time'] ;?>">
									</div>


									<div class="clear"></div>



									<div class="form-group bootstrap3-wysihtml5-wrapper">
										<label>خلفية الشركة:</label>
										<textarea name="co_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل خلفية الشركة" style="height: 200px;"><?php echo $row['co_background'] ;?></textarea>
									</div>




									<div class="form-group bootstrap3-wysihtml5-wrapper">
										<label> الرؤية:</label>
										<textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الرؤية" style="height: 200px;"><?php echo $row['vision'] ;?></textarea>
									</div>



									<div class="form-group bootstrap3-wysihtml5-wrapper">
										<label> الهدف:</label>
										<textarea name="goal" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الهدف" style="height: 200px;"><?php echo $row['goal'] ;?></textarea>
									</div>



									<div class="clear"></div>

									


								</div>


								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" name="update_company" class="btn btn-success">update</button>
								</div>
								<?php }?>
							</div>
						</div>
					</div>

							<!----edit-modal end--------->




					</div>
				</div>

				<!------main-content-end----------->
				<?php
				require "../connection.php";
				if (isset($_GET['update_garantee'])) {
					$id = $_GET['update_garantee'];


				?>
					<div class="modal fade" tabindex="-1" id="update_garantee" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">update garantee</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="garantee_crud.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>garantee file</label>
											<input type="file" name="garantee">
										</div>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" name="update_garantee" class="btn btn-success">update</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>


				<!----footer-design------------->

				<footer class="footer">
					<div class="container-fluid">
						<div class="footer-in">
							<p class="mb-0">&copy 2024 forsh employment website. All Rights Reserved.</p>
						</div>
					</div>
				</footer>




			</div>

		</div>


		<script type="text/javascript">
			$(window).on('load', function() {
				$('#update-garantee').modal('show');
			});
		</script>


		<script>
			function goBack() {
				window.history.back();
			}
		</script>


		<script>
			$('#update_garantee').modal({
				backdrop: 'static',
				keyboard: false
			})
		</script>

		<!----accept-modal start--------->
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


		<!-------complete html----------->






		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-3.3.1.min.js"></script>


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





</body>

</html>