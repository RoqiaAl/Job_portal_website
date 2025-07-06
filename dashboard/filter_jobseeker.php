<?php
require "../config.php";
$role=3;
$id=45;
if (isset($_GET['page'])) {
$page=$_GET['page'];

}else {
    $page=1;
}
if ($page<=1||$page) {
    $page=1;
    $page1=0;
}else {
    $page1=($page*5)-5;
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
                <h3><img src="img/logo.png" class="img-fluid" /><span>forsah</span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="">
                    <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
                </li>

                <li class="">
                    <a href="users.php" class="dashboard"><i class="material-icons">person</i>manage users </a>
                </li>


                <li class="">
                    <a href="company.php" class="dashboard"><i class="material-icons">store</i> manage companies</a>
                </li>

                <li class="active">
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
								<form method="post" action="filter_jobseeker.php">
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
												<?php $img=mysqli_query($con,"select image from user where id =$id");
												$user=mysqli_fetch_assoc($img);?>
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
										<h2 class="ml-lg-2">Manage Jobseekers</h2>
									</div>
									<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xE147;</i>
											<span>Add New Jobseeker</span>
										</a>
									</div>
								</div>
							</div>

							<table class="table table-striped table-hover">
								<thead>
									<tr>

										<th>id</th>
										<th>full_name</th>
										<th>Address</th>
										<th>educational_level</th>
										<th>category</th>
										<th>gender</th>
										<th>Actions</th>


									</tr>
								</thead>

								<tbody>
								<?php
                                if (isset($_POST['search_word'])) {
                                    $filter=$_POST['search_value'];
                                }
                                $query=mysqli_query($con,"select * from jobseeker_view where full_name='$filter'");
								$num=mysqli_num_rows($query);
									while ($row=mysqli_fetch_assoc($query)) {
										
									?>
									<tr>
										<th><?php echo $row['id'] ;?></th>
										<th><?php echo $row['full_name'] ;?></th>
										<th><?php echo $row['address'] ;?></th>


										<th><?php echo $row['educational_level'] ;?></th>
										<th><?php echo $row['category_name'] ;?></th>
										<th><?php echo $row['gender'] ;?></th>


										<th>
											<div class="row">
												<div class="col-md-3">
													<a href="../main/mycv.php?id=<?php echo $row['id'] ;?>" class="edit" >
														<i class="material-icons" data-toggle="tooltip" title="customize">visibility</i></a>
												</div>

												<div class="col-md-3">
													<a href="?edit_id=<?php echo $row['id'] ;?>" class="edit" >
														<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
												</div>
												
												<div class="col-md-3">
													<a href="user_customization.php?id=<?php echo $row['id'] ;?>" class="edit" >
														<i class="material-icons" data-toggle="tooltip" title="customize">rule customize</i></a>
												</div>

											</div>
										</th>
									</tr>
									<?php } ?>




								</tbody>


							</table>

							<?php
                           
						   $res = mysqli_query($con, "select * from jobseeker ");
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


					<!----add-modal start--------->
					<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Employees</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="jobseeker_crud.php" method="post" >
									<div class="form-group">
										<label>اسم المستخدم</label>
										<select name="user_id" id="">
										<?php
										require "connection.php";
										$query=mysqli_query($con,"select id , username from user_list");
										while($row=mysqli_fetch_assoc($query)){
										?>
										<option value="<?php echo $row['id'] ;?>"><?php echo $row['username'] ;?></option>
										<?php }?>

										</select>
									</div>

										<div class="form-group">
											<label>الاسم الرباعي</label>
											<input type="text" name="full_name" required class="form-control" placeholder="ادخل الاسم الرباعيا">
										</div>


										<div class="form-group">
											<label>الجنس</label>
											<select name="gender" required class="selectpicker show-tick form-control" data-live-search="false">
												<option selected value="">حدد</option>
												<option value="ذكر">ذكر</option>
												<option value="انثى">انثى</option>

											</select>
										</div>




										<div class="clear"></div>


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


										<div class="clear"></div>



										<div class="form-group">
											<label>تاريخ الميلاد</label>
											<input type="date" name="birth_data" required class="form-control" value="">
										</div>





										<div class="form-group">
											<label>الحالة الاجتماعية</label>
											<select name="civil_status" required class="selectpicker show-tick form-control" data-live-search="false">
												<option value="" selected>Select</option>

												<option value="متزوج"> متزوج/ة</option>
												<option value="عازب">عازب/ة</option>
												<option value="ارمل">ارمل/ة</option>

											</select>
										</div>


										<div class="clear"></div>



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



										<div class="clear"></div>



										<div class="form-group bootstrap3-wysihtml5-wrapper">
											<label>تحدث عن نفسك</label>
											<textarea name="u_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل وصف نفسك" style="height: 200px;"></textarea>
										</div>


									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" name="add_jobseeker" class="btn btn-success">Add</button>
								</div>
							</form>
							</div>
						</div>
					</div>

					<!----edit-modal end--------->





					<!----edit-modal start--------->
					<?php
					require "connection.php";
					if (isset($_GET['edit_id'])) {
						$id=$_GET['edit_id'];
					
					$query=mysqli_query($con,"call get_jobseeker($id);");
					while ($row=mysqli_fetch_assoc($query)) {
						
					
					?>
					<div class="modal fade" tabindex="-1" id="edit" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Employees</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="jobseeker_crud.php?id=<?php echo $id; ?>" method="post" >
									<div class="form-group">
										<label>اسم المستخدم</label>
										<select name="user_id" id="">
										<?php
										require "connection.php";
										$query=mysqli_query($con,"select id , username from user_list");
										while($cat=mysqli_fetch_assoc($query)){
										?>
                                                    <option <?php if ($row['id'] == $cat['id']) {
                                                                print ' selected ';
                                                            } ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['username']; ?></option>
															<?php }
                                             ?>

										</select>
									</div>

										<div class="form-group">
											<label>الاسم الرباعي</label>
											<input type="text" name="full_name" required class="form-control" placeholder="ادخل الاسم الرباعيا" value="<?php echo $row['full_name']; ?>">
										</div>


										<div class="form-group">
											<label>الجنس</label>
											<select name="gender" required class="selectpicker show-tick form-control" data-live-search="false">
												<option selected value="">حدد</option>
												<option <?php if ($row['gender'] == "ذكر") {
																print ' selected ';
															} ?> value="ذكر">ذكر</option>
													<option <?php if ($row['gender'] == "انثى") {
																print ' selected ';
															} ?> value="انثى">انثى</option>
											</select>
										</div>




										<div class="clear"></div>


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



										<div class="form-group">
											<label>القسم</label>
											<select name="category_id" required class="selectpicker show-tick form-control" data-live-search="true">
												<option selected value="">Select</option>
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


										<div class="clear"></div>



										<div class="form-group">
											<label>تاريخ الميلاد</label>
											<input type="date" name="birth_data" required class="form-control" value="<?php echo $row['birth_data']; ?>">
										</div>





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


										<div class="clear"></div>



										<div class="form-group">
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



										<div class="form-group bootstrap3-wysihtml5-wrapper">
											<label>تحدث عن نفسك</label>
											<textarea name="u_background" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل وصف نفسك" style="height: 200px;"><?php echo $row['u_background']; ?></textarea>
										</div>


									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" name="update_jobseeker" class="btn btn-success">update</button>
								</div>
								</form>
							</div>
						</div>
					</div>
<?php }} ?>
					<!----edit-modal end--------->


					<!----delete-modal start--------->
					

					<!----edit-modal end--------->




				</div>
			</div>

			<!------main-content-end----------->
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


			<!----footer-design------------->

			<footer class="footer">
				<div class="container-fluid">
					<div class="footer-in">
						<p class="mb-0">&copy 2024 forsah employment website. All Rights Reserved.</p>
					</div>
				</div>
			</footer>




		</div>

	</div>



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