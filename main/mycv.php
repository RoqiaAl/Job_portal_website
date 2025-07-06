<?php require "../config.php"; 
if (isset($id)) {
  $id=$id;
}else {
$id=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- divinectorweb.com -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/mycv.css">
</head>

<body dir="">
  <?php
  $sql = mysqli_query($con, "call get_info('$id');");
  while ($row = mysqli_fetch_assoc($sql)) {


  ?>
    <div class="container">
      <div class="header">
        <div class="img-area">
          <img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['image']) ?> " alt="">
        </div>
        <h1><?php echo $row['full_name']; ?></h1>
        <h3><?php echo $row['educational_level']; ?> في <?php echo $row['category_name']; ?></h3>
      </div>

      <div class="main">
        <div class="left">
          <h2>Personal Information</h2>
          <p><strong>Name:</strong> <?php echo $row['full_name']; ?></p>
          <p><strong>Date of Birth:</strong> <?php echo $row['birth_data']; ?></p>
          <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
          <p><strong>Social Status:</strong><?php echo $row['civil_status']; ?></p>
          <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
          <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
        <?php }
      mysqli_close($con); ?>
        <h2>Education</h2>

        <?php
        require "../connection.php";
        $sql = mysqli_query($con, "call get_by_clause('qualification','s_id','$id');");
        while ($row = mysqli_fetch_assoc($sql)) {


        ?>
          <ul>

            <li>
              <h3><?php echo $row['title']; ?></h3>
            </li>
            <p><?php echo $row['inistitute']; ?> - <?php echo $row['timeframe']; ?></p> <br>

          </ul>
        <?php }
        mysqli_close($con); ?>
        <h2>skills</h2>

        <?php
        require "../connection.php";
        $sql = mysqli_query($con, "call get_by_clause('skill','s_id','$id');");
        while ($row = mysqli_fetch_assoc($sql)) {


        ?>
          <ul>

            <li><?php echo $row['title']; ?></li>

          </ul>
        <?php } ?>
        <h2>languages</h2>
        <?php
        require "../connection.php";
        $sql = mysqli_query($con, "call get_by_clause('language','s_id','$id');");
        while ($row = mysqli_fetch_assoc($sql)) {


        ?>
          <ul>
            <li><?php echo $row['name']; ?></li>
          </ul>
        <?php } ?>
        </div>


        <div class="right">

          <h2>Work Experience</h2>
          <?php
          require "../connection.php";
          $sql = mysqli_query($con, "call get_by_clause('experience','s_id','$id');");
          while ($row = mysqli_fetch_assoc($sql)) {


          ?>
            <ul>
              <li>
                <h3><?php echo $row['title']; ?></h3>
              </li>
              <p><strong>Position:</strong> <?php echo $row['responsability']; ?></p>
              <p><strong>Duration:</strong> <?php echo $row['start_date']; ?>-<?php echo $row['end_date']; ?></p>
              <br>
            </ul>
          <?php } ?>

          <h2> training cources:</h2>
          <?php
          require "../connection.php";
          $sql = mysqli_query($con, "call get_by_clause('training','s_id','$id');");
          while ($row = mysqli_fetch_assoc($sql)) {


          ?>
            <ul>

              <li>
                <h3><?php echo $row['title']; ?></h3>
              </li>
              <p><?php echo $row['inistitute']; ?> - <?php echo $row['timeframe']; ?></p> <br>

            </ul>
          <?php }
          mysqli_close($con); ?>



        </div>
      </div>

    </div>



</body>

</html>