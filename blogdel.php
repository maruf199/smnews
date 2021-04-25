<?php
include 'db_connect.php';
if (isset($_GET['id'])){
    
    $id = $_GET['id'];
    $select="select * from blog where id='$id'";
    $result=mysqli_query($connect,$select);
    $row=mysqli_fetch_array($result);
    unlink($row['img']);
    $sql = "DELETE FROM blog WHERE id= '$id'";

    $result=mysqli_query($connect,$sql);

    if ($result)
    {
        header("location:blogview.php");
	} 
}