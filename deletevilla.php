<?php
include 'db.php';

$id=$_GET['id'];

$sql = "SELECT * FROM `villa` where villa_id={$id}";

$query = mysqli_query($con, $sql);
$res=mysqli_fetch_assoc($query);
unlink($res['villa_image']);
unlink($res['more_image']);

$q="delete from `villa` where villa_id=$id";

mysqli_query($con,$q);
echo "<script> alert('Deletion  Successful')</script>" ;
header('location:villa_table.php');
?>