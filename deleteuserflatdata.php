
<?php
include 'db.php';

$id=$_GET['id'];

$sql = "SELECT * FROM `userflats` where flat_id={$id}";

$query = mysqli_query($con, $sql);
$res=mysqli_fetch_assoc($query);
unlink($res['flat_image']);
unlink($res['more_image']);
unlink($res['original_docs']);

$q="delete from `userflats` where flat_id=$id";

mysqli_query($con,$q);
echo "<script> alert('Deletion  Successful')</script>" ;
header('location:userflatdata.php');
?>