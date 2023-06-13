<?php
include 'db.php';

$id=$_GET['id'];

$sql = "SELECT * FROM `land` where land_id={$id}";

$query = mysqli_query($con, $sql);
$res=mysqli_fetch_assoc($query);
unlink($res['land_image']);


$q="delete from `land` where land_id=$id";

mysqli_query($con,$q);
echo "<script> alert('Deletion  Successful')</script>" ;
header('location:land_table.php');
?>