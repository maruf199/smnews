<?php include'db_connect.php';
$limit = 10; 

    if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
       {
        $page=1; 
       };  

$record_index= ($page-1) * $limit; 
 ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">
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

  <!-- Page Content -->
  <div class="container">
   <div class="job">


      <div class="row">

         <?php 
      $sql="select * from job order by id desc";
      $result=mysqli_query($connect,$sql);
      if($result){

        while ($row=mysqli_fetch_array($result)) 

          {?>
         <div class="col-md-6">
           <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo $row['job_image'] ?>" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['job_title'] ?></h5>
        <p class="card-text"><small class="text-muted">আবেদনের শুরুর সময়ঃ<?php echo $row['start_time'] ?></small></p>
        <p class="card-text"><small class="text-muted">আবেদনের শেষ সময়ঃ<?php echo $row['end_time'] ?></small></p>

       <a href="neswsdetails.php?id=<?php echo $row['id']?>"" title="" class="btn btn-success">Read More</a>
      </div>
    </div>
  </div>
</div>
</div>
      <?php 
}

}



       ?>
      </div>



   </div>
      
    </div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container-fluid">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
