<?php
include 'db.php';

$id=$_GET['id'];

$sql = "SELECT * FROM `rents` where rent_id={$id}";

$query = mysqli_query($con, $sql);
$res=mysqli_fetch_assoc($query);
unlink($res['rent_image']);
unlink($res['more_image']);

$q="delete from `rents` where rent_id=$id";

mysqli_query($con,$q);
echo "<script> alert('Deletion  Successful')</script>" ;
header('location:rent_table.php');
?>