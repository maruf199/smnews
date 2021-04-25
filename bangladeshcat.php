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
<?php  date_default_timezone_set('Asia/Dhaka');?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bangladesh</title>

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

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h4 class="my-4">ক্যাটাগরিঃবাংলাদেশ
        </h4>

        <!-- Blog Post -->

      <?php 
      $sql="select * from blog where catagory='বাংলাদেশ' order by id desc limit $record_index, $limit";
      $result=mysqli_query($connect,$sql);
      if($result){

        while ($row=mysqli_fetch_array($result)) 

          {?>
        <div class="card mb-4">
          <img src="<?php echo $row['img']?>" alt="Card image cap" class="responsive">
          <div class="card-body">
            <h2 class="card-title"><?php echo $row['title_name'] ?></h2>
            <a href="blogfullpage.php?id=<?php echo $row['id']?>"class="btn btn-danger">Read More</a>

          </div>
          <div class="card-footer text-muted">
 প্রকাশের তারিখ ও সময়:<?php echo $row['date'] ?> <?php echo $row['time']?>
          </div>
        </div>
     <?php 
 }

}

      ?>

        <!-- Pagination -->
    
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
         <div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/timezone/asia--dhaka"><span style="color:gray;"></span><br />ঢাকা,বাংলাদেশ</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FDhaka" width="100%" height="115" frameborder="0" seamless></iframe> </div>
         
        </div>

        <!-- Categories Widget -->
           
          </div>
      
      </div>

    </div>
    <!-- /.row -->
<?php 

$sql="SELECT COUNT(*) FROM blog";
$result1=mysqli_query($connect,$sql); 
$row=mysqli_fetch_row($result1);
$total_records =$row[0];
$total_pages = ceil($total_records / $limit);
for($i=2; $i<=$total_pages; $i++){

echo"<ul class='pagination justify-content-center'>";
  echo "<li><a href='bangladeshcat.php?page=".($page-1)."' class='button'>PREVIOUS</a></li>"; 
    echo "<li><a href='bangladeshcat.php?page=".($page+1)."' class='button'>NEXT</a></li>";

echo"</ul>";
    
  }
  ?>
  
  <!-- /.container -->

  <!-- Footer -->
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
