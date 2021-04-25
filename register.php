<?php include"db_connect.php" ?>
<?php include"htmlconnection.php" ?>
<?php 
if(isset($_POST['submit'])){

   $name=$_POST['name'];
   $user=$_POST['user'];
   $password=$_POST['pass'];
   $password=md5($password);
   $confirm=$_POST['confrim'];
   $confirm=md5($confirm);

   if($password!==$confirm){

    echo"<script>alert('Password does not match')</script>";
   }
   
  else if(empty($name)){
   echo" <script>alert('Please check your name')</script>";
   }
   else if(empty($user)){
   echo" <script>alert('Please check your username')</script>";
   }
   else if(empty($password)){
   echo" <script>alert('Please check your password')</script>";
   }
  
  else{

   $sql="select * from login where user='$user'";
  $result=mysqli_query($connect,$sql);
  $count = mysqli_num_rows($result);

  if($count==1){

    echo"<script>alert('Already user has been taken')</script>";
}
  else{

    $reg="insert into login(name,user,pass)values('$name','$user','$password'  )";
    mysqli_query($connect,$reg);
      
    echo"<script>alert('Registration Successfully.')</script>";

    }
  }
}

 ?>

<h1><strong>Registration Form</strong></h1><br>
<div class="form">
 <form action="" method="POST">
 <div class="form-input">
 <input type="text" class="form-control py-4" id="inputFirstName" name="name" placeholder="Enter Your Name"> 
 </div>
 <div class="form-input">
 <input type="text" class="form-control py-4" id="inputFirstName" name="user" placeholder="Enter Your Username">
 </div>
 <div class="form-input">
 <input type="password" class="form-control py-4" id="inputFirstName" name="pass" placeholder="Enter Your Password"> 
 </div>
 <div class="form-input">
 <input type="password" class="form-control py-4" id="inputFirstName"name="confrim" placeholder="Enter Your Confirm Password"> 
 </div>
 <br>
 <input type="submit" name="submit" value="CONFIRM" class="btn btn-success"/>
<br><br>
 <a href="login.php" title="">login Now</a>
  </form>
</div>
 
