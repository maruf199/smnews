
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
                </nav>
            </div>
             <div id="layoutSidenav_content">
             <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Blog Viewe</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Catagory</th>
                                                <th>Title Name</th>
                                                <th>Time</th>
                                                <th>Date</th>
                                                <th>Image</th>
                                                <th>Title_Explanation</th> 
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php 
                                                    
                                                 $sql="select * from blog";
                                                 $result=mysqli_query($connect,$sql);
                                                 if($result){
                                                    while ($row=mysqli_fetch_array($result)) 

                                                        {?>       
                                                <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td><?php echo $row['catagory']?></td>
                                                <td><?php echo $row['title_name']?></td>
                                                <td><?php echo $row['time']?></td>
                                                <td><?php echo $row['date']?></td>
                                                <td><img src="<?php echo $row['img']?>" width="100px" height="100px"></td>

                                                    <td><?php echo $row['title_explanation']?></td>
                                                    <td>
                                                    <a href="blogdel.php?id=<?php echo $row['id']?>"class="btn btn-danger">Remove</a>
                                                     <a href="blogupdate.php?id=<?php echo $row['id']?>"class="btn btn-danger">change</a>

                                                </td>
                                                </tr>
                                             <?php


                                                    }

                                                 }

                                                 ?>
                                                
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    </body>
</html>
