
<?php include"db_connect.php"?>
<?php 
session_start(); 
if(isset($_SESSION['user']))

{

    
}

else{



    header('location:login.php');
}


?>
<?php  date_default_timezone_set('Asia/Dhaka');?>
<?php
if (isset($_POST['submit'])){
    $cat_name=$_POST['cat'];
    $title_name=$_POST['title'];
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    $title_explanation=$_POST['title_explanation'];
    $filename= $_FILES['image']['name'];
    $filetype= $_FILES['image']['type'];
    $file_tmp_name= $_FILES['image']['tmp_name'];
    $filesize  = $_FILES['image']['size'];

    $permited = ['jpg','jpeg','png','gif'];

                $div = explode('.', $filename);
                $file_ext = strtolower(end($div));
                $uniqueimage = substr(md5(time()), 0,10).'.'.$file_ext;
                $dir = 'job_upload/'.$uniqueimage;

                 if (empty($filename)) {
                echo"<script>alert('Please Select Image')</script>";
            }
            elseif($filesize>1000000)
            {
                echo"<script>alert('Image Size Must be 1MB or less then')</script>";
            }       
            elseif(in_array($file_ext, $permited) === false)
            {
               echo"alert('You can upload only jpg,jpeg,png,gif')";
            }   
                else{
                    move_uploaded_file($file_tmp_name, $dir);

                         
              $sql="insert into job(job_cat,job_title,start_time,end_time,job_image,job_title_explanation)values('$cat_name','$title_name','$start_time','$end_time','$dir','    $title_explanation')";
              $result=mysqli_query($connect,$sql);
    if($result){
        
        echo"<script>alert('Insert Sucessfully')</script>";
    }

    else {
        echo"<script>alert('Please try again')</script>";
    

    }
    

     }

}



?>


 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                        <a class="dropdown-item" href="" style="color:red;font-weight: bold"><?php echo $_SESSION['user'] ?></a>
                        <a class="dropdown-item" href="#">Password Change</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="blogadd.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               News Add
                            </a>
                            <a class="nav-link" href="blogview.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               News View
                            </a>
                            <a class="nav-link" href="jobnewsadd.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Job News Add
                            </a>
                            <a class="nav-link" href="jobnewsview.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Job News View
                            </a>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
        </div>

  <div class="blogform">
 <form action="" method="POST" enctype="multipart/form-data">
 <select class="form-control" id="exampleFormControlSelect1" name="cat">
    <option value="">ক্যাটাগরি সিলেক্ট করুন</option>
    <option value="সরকারি চাকরি">সরকারি চাকরি</option>
    <option value="বেসরকারি চাকরি">বেসরকারি চাকরি</option>
    
  </select> 

  <input type="text" name="title" class="form-control" id="exampleFormControlSelect1" placeholder="চাকরির শিরোনাম লিখুন">
  <input type="text" name="start_time" class="form-control" id="exampleFormControlSelect1" placeholder="আবেদনের শুরুর সময়">
   <input type="text" name="end_time" class="form-control" id="exampleFormControlSelect1" placeholder="আবেদনের শেষ সময়">
  
  <input type="file" name="image" class="form-control" id="exampleFormControlSelect1">

  <textarea name="title_explanation"></textarea>
  <br>
  <input href=""type="submit" name="submit" value="Add"class="btn btn-success">
    <input type="reset" name="submit" value="RESET" class="btn btn-success"/>
 </div>
            
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace("title_explanation");
        </script>
    </body>
</html>
