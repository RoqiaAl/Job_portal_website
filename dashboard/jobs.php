<?php
require "../config.php";

if (isset($_GET['page'])) {
$page=$_GET['page'];

}else {
    $page=1;
}
if ($page<=1) {
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
                <h3><img src="img/logo.png" class="img-fluid" /><span>forsh</span></h3>
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

                <li class="">
                    <a href="jobseeker.php" class="dashboard"><i class="material-icons">badge</i>manage jobseeker </a>
                </li>


                <li class="active">
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
								<form method="post" action="filter_job.php">
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
										<h2 class="ml-lg-2">Manage jobs</h2>
									</div>
									<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xE147;</i>
											<span>Add New job</span>
										</a>

									</div>
								</div>
							</div>

							<table class="table table-striped table-hover">
								<thead>
									<tr>

										<th>id</th>
										<th>title</th>
										<th>category</th>
										<th>company</th>
										<th>region</th>

										<th>applicants</th>
										<th>status</th>
										<th>Actions</th>


									</tr>
								</thead>

								<tbody>
									<?php $query = mysqli_query($con, "select * from job_view limit $page1,5");
									$num=mysqli_num_rows($query);
									while ($row = mysqli_fetch_assoc($query)) {

									?>
										<tr>
											<th><?php echo $row['id']; ?></th>
											<th><?php echo $row['title']; ?></th>
											<th><?php echo $row['category_name']; ?></th>
											<th><?php echo $row['co_name']; ?></th>
											<th><?php echo $row['region_name']; ?> </th>
											<th><a href="../company/view-applicants.php?<?php echo $row['id']; ?>">view</a></th>
											<th>
											<div class="col-md-3" >
											<?php if ($row['status'] == 1) {
                                                echo '<a href="job_crud.php?status_no='. $row['id'] . '&status=0 "   style=" background-color: yellow; ">reject</a>';
                                            } else {
                                                echo '<a href="job_crud.php?status_no=' . $row['id'] . '&status=1"  style=" background-color:rgb(23, 149, 199); ">accept</a>';
                                            }  ?>
												</div>
											</th>

											<th>
												<div class="row">
													<div class="col-md-3">
														<a href="../main/job_details.php?id=<?php echo $row['id']; ?>" class="edit">
															<i class="material-icons" data-toggle="tooltip" title="customize">visibility</i></a>
													</div>

													<div class="col-md-3">
														<a href="?edit_id=<?php echo $row['id']; ?>" class="edit">
															<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
													</div>
													<?php if ($role==3) {
													 ?>
													<div class="col-md-3">
														<a href="?delete_id=<?php echo $row['id']; ?>" class="delete">
															<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
													</div>
													<?php }?>

													
												</div>
													</div>


												</div>
											</th>
										</tr>
									<?php } ?>



								</tbody>


							</table>

							<?php
                           
						   $res = mysqli_query($con, "select * from job ");
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
									<form action="job_crud.php" method="post">
										
									<div class="form-group">
										<label>اسم الشركة</label>
										<select name="co_id" id="">
										<?php
										require "../connection.php";
										$query=mysqli_query($con,"select id , co_name from company_list");
										while($row=mysqli_fetch_assoc($query)){
										?>
										<option value="<?php echo $row['id'] ;?>"><?php echo $row['co_name'] ;?></option>
										<?php }?>

										</select>
									</div>

											<div class="form-group">
												<label> المسمى الوظيفي </label>
												<input name="title" required type="text" class="form-control" value="" placeholder="ادخل  المسمى الوظيفي ">
											</div>

											
										<div class="clear"></div>

										

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

											<div class="form-group">
												<label> العدد المطلوب</label>
												<input type="number" name="req_no" required class="form-control" value="" placeholder=" أدخل العدد المطلب">
											</div>

										
										<div class="clear"></div>

										

											<div class="form-group">
												<label> تاريخ الاغلاق</label>
												<input type="date" name="date_line" required class="form-control" value="">
											</div>

											<div class="form-group">
												<label>المدينة</label>
												<select class="form-control" name="region_id">
													<option selected value="">select</option>
													<?php
													require "../connection.php";
													$query = mysqli_query($con, "select * from region;");
													if (mysqli_num_rows($query) > 0) {
														while ($row = mysqli_fetch_assoc($query)) { ?>
															<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

													<?php }
													}
													mysqli_close($con); ?>
												</select>
											</div>

										
										<div class="clear"></div>
										

											<div class="form-group ">
												<label>نوع الدوام</label>
												<select name="working_time" class="form-control">
													<option selected value="">وقت الدوام</option>
													<option value="full_time">دوام كامل</option>
													<option value="part_time">دوام جزئي</option>
													<option value="online">online</option>
												</select>
											</div>

										
										
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
										



										<div class="clear"></div>
										

											<div class="form-group">
												<label> الراتب</label>
												<input type="text" name="salary" required class="form-control" value="">
											</div>

										
										<div class="clear"></div>
										

											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label>الوصف الوظيفي:</label>
												<textarea name="description" class="bootstrap3-wysihtml5 form-control" placeholder="أدخل الوصف الوظيفي" style="height: 200px;"></textarea>
											</div>

										
										

											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label>مسؤوليات الوظيفة:</label>
												<textarea name="responsability" required class="bootstrap3-wysihtml5 form-control" placeholder="ادخل المسؤوليات" style="height: 200px;"></textarea>
											</div>

										

											<div class="form-group bootstrap3-wysihtml5-wrapper">
												<label>المتطلبات:</label>
												<textarea name="requirements" required class="bootstrap3-wysihtml5 form-control" placeholder="ادخل المتطلبات" style="height: 200px;"></textarea>
											</div>



										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<button type="submit" name="add_job" class="btn btn-success">Add</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!----edit-modal end--------->

						<?php
					require "../connection.php";
					if (isset($_GET['edit_id'])) {
						$id=$_GET['edit_id'];
					
					$query=mysqli_query($con,"call job_details($id);");
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
									<form action="job_crud.php?id=<?php echo $id; ?>" method="post" >
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
                                                    <option <?php if ($cat['name'] == $row['category_name']) {
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
                                                    <option <?php if ($cat['name'] == $row['region_name']) {
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
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" name="update_job" class="btn btn-success">update</button>
								</div>
								</form>
							</div>
						</div>
					</div>
<?php }} ?>
















                    <?php
					require "../connection.php";
					if (isset($_GET['delete_id'])) {
						$id=$_GET['delete_id'];
						?>
						<!----delete-modal start--------->
						<div class="modal fade" tabindex="-1" id="delete" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Delete Employees</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Are you sure you want to delete this Records</p>
										<p class="text-warning"><small>this action Cannot be Undone,</small></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<a href="job_crud.php?no=<?php echo $id; ?>" class="btn btn-success">delete</a>
									</div>
								</div>
							</div>
						</div>
						<?php }?>

						<!----edit-modal end--------->




					</div>
				</div>

				<!------main-content-end----------->

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

<script type="text/javascript">
        $(window).on('load', function() {
            $('#delete').modal('show');
        });
    </script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <script>
        $('#delete').modal({
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