
<?php include'db_connect.php' ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Post - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">

 
</head>

<body>

  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><b>Online Newspaper</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">হোম
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="bangladeshcat.php">বাংলাদেশ</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="sportscat.php">খেলাধুলা </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="binodoncat.php">বিনোদন</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="sciencecat.php">বিজ্ঞান ও প্রযুক্তি </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="internationcat.php">আন্তর্জাতিক</a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="newspage.php">চাকরির খবর</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php 
      $sql="select * from job where id={$_GET['id']}";
      $result=mysqli_query($connect,$sql);
      if($result){
        while ($row=mysqli_fetch_assoc($result)) 

          {?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $row['job_title'] ?></h1>

        <!-- Author -->
        <p>
          <b>Catagory:</b><?php echo $row['job_cat'] ?>
        </p>

        <p>আবেদনের শুরুর সময়ঃ <?php echo $row['start_time'] ?></p>
        <p>আবেদনের শেষ সময়ঃ <?php echo $row['end_time'] ?></p>

        <!-- Preview Image -->
        <img src="<?php echo $row['job_image']?>" alt="" class="responsive">

        <hr>

        <!-- Post Content -->
        <p><?php echo $row['job_title_explanation'] ?></p>


<?php 
}
} 

?>
          
        </div>

        <div class="col-lg-4">
        
          
        
        <div class="card my-4">
        <div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/timezone/asia--dhaka"><span style="color:gray;"></span><br />ঢাকা,বাংলাদেশ</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FDhaka" width="100%" height="115" frameborder="0" seamless></iframe> </div>
        </div>
        
        </div>
      </div>
    </div>
      
<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
