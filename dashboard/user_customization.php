<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JOB-LIST</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/line-icons.css">




    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <style>
        div.class {
            border: 1px solid black;
            margin-right: 5px;
            margin-left: 10px;
            width: 208px;
            background-color: lightgrey;
            padding: 10px 0 10px 6px;
        }

        .container {
            margin: 50px;
            background-color: white;
            border: 1px solid black;
            padding: 20px;
        }

        .buttons {
            display: inline-flex;
            gap: 10px;
        }
    </style>


    <!-- Customized Bootstrap Stylesheet -->


    <!-- Template Stylesheet -->

</head>

<body>
    <section id="companies" class="text-center">

        <div class="container">

            <form action="update_user_permission.php?id=<?php echo $_GET['id'];?>" method="post">

                <div class="row g-4 text-start">
                    <?php
                    
                    require "../connection.php";
                    if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                   
                    $update= mysqli_query($con, "select * from user_permission where user_id=$id ");
                    
                        $selected_privilege= [];
                        foreach ($update as $user) {
                            $selected_privilege[]=$user['privilege_id'];

                        }
                    }
                    ?>
                            <div class="col-md-4 class  " data-aos="fade-up">
                                <h4> manage users</h4>
                                <?php
                                require "../connection.php";

                                $query = mysqli_query($con, "select * from privileges where class_id=6 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                        <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>

                            </div>

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage company</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=1 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                          <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage jobseeker</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=2 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                          <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage jobs</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=3 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                         <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                           
                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage feedback</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=9 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                         <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                           

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage qualification</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=11 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                         <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage experience</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=12 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                         <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage training</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=13 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                         <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage language</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=14 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                         <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="col-md-4 class " data-aos="fade-up">
                                <h4>manage skill</h4>
                                <?php
                                require "../connection.php";
                                $query = mysqli_query($con, "select * from privileges where class_id=15 ");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $privilege) {
                                ?>
                                         <input type="checkbox" name="privilege[]" <?php echo in_array($privilege['privilege_id'], $selected_privilege) ? 'checked':''; ?> 
                                        value="<?php echo $privilege['privilege_id']; ?>"><?php echo $privilege['privilege_name']; ?><br />
                                <?php
                                    }
                                }
                                ?>
                            </div>


                    
                </div>


                <div class="buttons">
                    
                    <div class="form-groub mt-3">
                        <button type="submit" name="update_permission" class="btn btn-primary">update</button>

                    </div>
                </div>

            </form>
        </div>

    </section>
</body>


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