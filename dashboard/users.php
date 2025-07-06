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
                <h3><img src="img/logo.png" class="img-fluid" /><span>forsah</span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="">
                    <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
                </li>

                <li class="active">
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
								<form method="post" action="filter_user.php">
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
                                        <h2 class="ml-lg-2">Manage users</h2>
                                    </div>
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                            <i class="material-icons">&#xE147;</i>
                                            <span>Add New user</span>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>id</th>
                                        <th>user Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>image</th>
                                        <th>role</th>
                                        <th>privileges</th>
                                        <th>Actions</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                   
                                    require "../connection.php";
                                    if ($role==3) {
                                        $query = mysqli_query($con, "select * from user_list limit $page1,5");
                                    }else {
                                        $query = mysqli_query($con, "select * from user_list where role_name='jobseeker'OR
                                        
                                        role_name='company' limit $page1,5");
                                    }
                                    
                                    $num=mysqli_num_rows($query);
                                    while ($row = mysqli_fetch_assoc($query)) {

                                    ?>
                                        <tr>
                                            <th><?php echo $row['id']; ?></th>
                                            <th><?php echo $row['username']; ?></th>
                                            <th><?php echo $row['email']; ?></th>
                                            <th><?php echo $row['phone']; ?></th>
                                            <th><?php echo $row['address']; ?></th>
                                            <th> <a href="?update_image=<?php echo $row['id']; ?>"><img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['image']) ?> " alt="" style="height: 50px; width: 60px;"></a></th>

                                            <th><?php echo $row['role_name']; ?></th>
                                           <th> 
													<a href="user_customization.php?id=<?php echo $row['id'] ;?>" class="edit" >
														<i class="material-icons" data-toggle="tooltip" title="customize"></i>customize</a>
												
                                            </th>



                                            <th>
                                                <a href="?edit_id=<?php echo $row['id']; ?>" class="edit">
                                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                                </a>
                                                <?php
                                                if ($row['status'] == 1 &&$role==3) {

                                                ?>
                                                    <a href="?block_id=<?php echo $row['id']; ?>" class="delete">
                                                        <i  class="material-icons" data-toggle="tooltip" title="block">block</i></a>
                                            <?php }elseif($row['status'] == 2 &&$role==3){
                                                ?>
                                                <a href="?block_id=<?php echo $row['id']; ?>" class="delete">
                                                        <i style="color: green;"  class="material-icons" data-toggle="tooltip" title="block">block</i></a>

                                           <?php }}
                                            ?>


                                            </th>
                                        </tr>
                                </tbody>


                            </table>
                            <?php
                                   
                           require "../connection.php";
                           if ($role==3) {
                            $res = mysqli_query($con, "select * from user_list");
                           }else {
                            $res = mysqli_query($con, "select * from user_list where role_name='jobseeker'OR
                               
                               role_name='company' ");
                           }
                          
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
                                    <h5 class="modal-title">Add user</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../auth/sign_up.php" method="post">
                                        <div class="form-group">
                                            <label>username</label>
                                            <input type="text" class="form-control" required name="username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="emil" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label>password</label>
                                            <input type="text" class="form-control" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>confirm_password</label>
                                            <input type="text" class="form-control" name="confirm_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>role</label>
                                            <select name="role_id" id="">
                                                <?php if ($role==3) {
                                                   echo'<option value="1">jobseeker</option>
                                                   <option value="2">company</option>
                                                   <option value="3">supervisor</option>
                                                   <option value="4">admin_1</option>
                                                   <option value="5">admin_2</option>';}
                                                   else {
                                                    echo'<option value="1">jobseeker</option>
                                                    <option value="2">company</option>';
                                                   } ?>
                                                
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" name="add_user">Add</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!----add-modal end--------->
                    <?php
					require "../connection.php";
					if (isset($_GET['update_image'])) {
						$id=$_GET['update_image'];
					
					
					?>
		<div class="modal fade" tabindex="-1" id="update_image" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">update image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="user_crud.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" >
        <div class="form-group">
		    <label>garantee file</label>
			<input type="file" name="image">
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="update_image" class="btn btn-success">update</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<?php } ?>





                    <!----edit-modal start--------->

                    <?php
                    if (isset($_GET['edit_id'])) {
                        $id = $_GET['edit_id'];
                        $query = mysqli_query($con, "call get_profile('$id');");
                        $row = mysqli_fetch_assoc($query);


                    ?>
                        <div class="modal fade" tabindex="-1" id="edit" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add user</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="user_crud.php?id=<?php echo $id; ?>" method="post">

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="emil" class="form-control" name="email" required value="<?php echo $row['email'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>username</label>
                                                <input type="text" class="form-control" required name="username" value="<?php echo $row['username'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" required value="<?php echo $row['phone'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" required value="<?php echo $row['address'] ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success" name="update_user">update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!----edit-modal end--------->


                    <!----delete-modal start--------->
                    <?php if (isset($_GET['block_id'])) {
                        require "../connection.php";
                        $id = $_GET['block_id'];
                        $query = mysqli_query($con, "call get_profile('$id');");
                        $row = mysqli_fetch_assoc($query);
                    ?>
                        <div class="modal fade" tabindex="-1" id="block" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Employees</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to block <b style="background-color:aqua"><?php echo $row['username']; ?></b></p>
                                        <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <?php
                                        if ($row['status'] == 1) {
                                            echo '<a href="user_crud.php?status_no=' . $id . '&status=2 " class="btn btn-success"  style=" background-color:red; ">block</a>';
                                        } else {
                                            echo '<a href="user_crud.php?status_no=' . $id . '&status=1 " class="btn btn-success" style=" background-color: rgb(23, 149, 199); ">unblock</a>';
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!----edit-modal end--------->




                </div>
            </div>

            <!------main-content-end----------->



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



    <!-------complete html----------->
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#update_image').modal('show');
        });
    </script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <script>
        $('#update_image').modal({
            backdrop: 'static',
            keyboard: false
        })
    </script>
    



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


 <!-- Optional JavaScript -->

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#block').modal('show');
        });
    </script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <script>
        $('#block').modal({
            backdrop: 'static',
            keyboard: false
        })
    </script>

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