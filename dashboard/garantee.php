<?php 
require "../connection.php";
if (isset($_GET['id'])) {
    $id=$_GET['id'];
   
    $query=mysqli_query($con," select garantee from compant where id=$id");
   while ($row=mysqli_fetch_assoc($query)) {
    
   

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view garantee</title>
    <style>
        
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        width: 21cm; /* A4 width */
        height: 29.7cm; /* A4 height */
        border: 1px solid black;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    img {
        max-width: 100%;
        max-height: 100%;
    }
</style>
  
</head>
<body>
  <div class="container" >
<img src="<?php echo 'data:image/png;base64 ,' . base64_encode($row['garantee']) ?> " alt="" >
</div>
<?php } 
}?>
</body>
</html>