
<?php
session_start();
  include"db_connect.php";
  include"htmlconnection.php";
  if(isset($_POST['submit'])){
      $user = $_POST['user'];
      $password = $_POST['pass'];
      $password=md5($password);
      $_SESSION['user']=$user;
 
      if(empty($_POST['user'])){

       echo" <script>alert('Email Required')</script>";
   }

    elseif(empty($_POST['pass'])){

       echo" <script>alert('Password Required')</script>";
    
      }

   else{
   $sql="select * from login where user='$user'and pass ='$password'";
   $result= mysqli_query($connect,$sql);
   $count = mysqli_num_rows($result);
   

   if($count==1){
        
       header('location:admin.php');
   }
   else{
       
       echo"<script>alert('User not Registerd.')</script>";

   }
   
  }
}
?>
<h1><strong>Admin Pannel</strong></h1><br>
 <div class="form">
 <form action="" method="POST">
 <div class="form-input">
 <input class="form-control py-4" id="inputFirstName" type="text" name="user" placeholder="Enter Your user"> 
 </div>
 <div class="form-input">
 <input class="form-control py-4" id="inputFirstName" type="password" name="pass" placeholder="Enter Your Password">
 </div>
 <br>
 <input href=""type="submit" name="submit" value="Login"class="btn btn-success"><br><br>
 <a href="register.php" title="" style="padding:10px">Create an account</a>
  </form>
 </div>