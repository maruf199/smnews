<?php include"db_connect.php" ?>
<?php include"htmlconnection.php" ?>
<?php 
if(isset($_POST['submit'])){

   $new_pass=$_POST['chage_pass'];
   $id=$_POST['id'];
  if(empty($new_pass)){
   echo" <script>alert('Please Fill up required field')</script>";
  else{

   $sql="select * from login where id='$user'";
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

<h1><strong>Passwrod Change</strong></h1><br>
<div class="form">
 <div class="form-input">
 <input type="password" class="form-control py-4" id="inputFirstName"name="chage_pass" placeholder="Enter Your New Password"> 
 </div>
 <input type="hidden" name="id" value="<?php echo $row['id']?>">
 <br>
 <input type="submit" name="submit" value="CONFIRM" class="btn btn-success"/>
<br><br>
 <a href="login.php" title="">login Now</a>
  </form>
</div>
 
