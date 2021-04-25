<?php
 
 $db_host="localhost";
 $db_user="root";
 $db_pass="";
 $db_name="cmt";


$connect=mysqli_connect($db_host,$db_user,$db_pass,$db_name);


if(!$connect){

	echo"database not connected";
}

else{
echo"";
}

 ?>