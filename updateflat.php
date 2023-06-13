<?php
include 'db.php';

$id = $_GET['id'];
$name = "";
$builders_name = "";
$price = "";
$rooms="";
$ammenities="";
$address="";
$location="";
$contact_builder="";
$image="";
$more_image="";

$q = "SELECT * FROM `flats` where flat_id=$id";

$query = mysqli_query($con, $q);
while ($res = mysqli_fetch_array($query)) {

    $name = $res['name'];
    $builders_name = $res['builders_name'];
    $price = $res['price'];
    $rooms = $res['rooms'];
    $ammenities = $res['ammenities'];
    $address = $res['address'];
    $location=$res['location'];
    $contact_builder = $res['contact_builder'];
    $image=$res['flat_image'];
    $more_image=['more_image'];
    $img=$res['more_image'];
    $img=explode(" ",$img);
    $count=count($img)-1;

}
?>
<?php
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
  $builders_name = mysqli_real_escape_string($con, $_POST['builder_name']);
  $rooms = mysqli_real_escape_string($con, $_POST['rooms']);
  $price = mysqli_real_escape_string($con, $_POST['price']);
  $ammenities = mysqli_real_escape_string($con, $_POST['ammenities']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $location=mysqli_real_escape_string($con,$_POST['location']);
  $contact_builder = mysqli_real_escape_string($con, $_POST['contact_builder']);

  $filename = $_FILES['flat_image']['name'];
  $tempname = $_FILES['flat_image']['tmp_name'];
  $folder = "flat_images/" . $filename;
  move_uploaded_file($tempname, $folder);

//   $more_image=$_FILES['more_image'];
//   $file='';
//   $file_tmp='';
//   $location1="flat_images/";
//   $data1='';
  
//   foreach($_FILES['more_image']['name'] as $key=>$val)
//  {
//   $file=$_FILES['more_image']['name'][$key];
//   $file_tmp=$_FILES['more_image']['tmp_name'][$key];
//   move_uploaded_file($file_tmp,$location1.$file);
//   $data1 .=$file." ";
//  }




    if ($_FILES['flat_image']['error'] != 4 && $_FILES['more_image']['error']!=4)
        $q = " update  `flats` set flat_id=$id,name='$name',builders_name='$builders_name',price='$price',rooms='$rooms',ammenities='$ammenities',address='$address',location='$location',contact_builder='$contact_builder',`flat_image`='$folder' where flat_id=$id";
    else
        $q = " update  `flats` set flat_id=$id,name='$name',builders_name='$builders_name',price='$price',rooms='$rooms',ammenities='$ammenities',location='$location',address='$address',contact_builder='$contact_builder' where flat_id=$id";
echo $q;
exit;

    $query = mysqli_query($con, $q);
    
    if ($query) {
        header('location:flat_table.php');
        exit;
    } else {
        echo "<script>alert('Data not submitted')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <link rel="stylesheet" href="flat.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container" style="height:1500px">
    <form action="#" method='post' name="form" onsubmit="return validateForm();" autocomplete="off" enctype="multipart/form-data" class="form">
      <h2 class="title" style="text-align:center;">UPDATE FLAT</h2>
     <p style="text-align:center"></p>
      
      <div class="user-info">
            <div class="fields">
                  <label for="Flat name">Flat Name</label>
                  <input type="text"
                        id="name"
                        name="name"
                        value="<?php echo $name ?>"
                        class="form-control"
                        placeholder="Enter the Flat Name">
                 </div>
                 <div class="fields">
                  <label for="Builder name">Builder Name</label>
                  <input type="text"
                        id="builder_name"
                        name="builder_name"
                        value="<?php echo $builders_name ?>"
                        class="form-control"
                        placeholder="Enter the Builder Name">
                 </div>
                 <div class="fields">
                  <label for="Rooms">Number of Rooms</label>
                  <input type="text"
                        id="rooms"
                        name="rooms"
                        value="<?php echo $rooms ?>"
                        class="form-control"
                        placeholder="Enter the Number of Rooms">
                 </div>
                 <div class="fields">
                  <label for="Price">Price</label>
                  <input type="text"
                        id="price"
                        name="price"
                        value="<?php echo $price ?>"
                        class="form-control"
                        placeholder="Enter the Flat Price">
                 </div>
                 <div class="fields">
                  <label for="Flat name">Address</label>
                  <input type="text"
                        id="address"
                        name="address"
                        value="<?php echo $address ?>"
                        class="form-control"
                        placeholder="Enter the Address">
                 </div>
                 <div class="fields">
                 <label for="Flat name">Location of Flat</label>
                  <!-- <input type="text"
                        id="location"
                        name="location"
                        class="form-control"
                        placeholder="Enter the Flat Location">
                  -->
                 <select class="form-control" value="<?php echo $location?>" name="location" id="location">
  <option class="form-control" value="Bangalore">Bangalore</option>
  <option class="form-control" value="Pune">Pune</option>
</select>
                 </div>
                 <div class="fields">
                  <label for="Flat name">Contact of Builder</label>
                  <input type="text"
                        id="contact_builder"
                        name="contact_builder"
                        value="<?php echo $contact_builder?>"
                        class="form-control"
                        placeholder="Enter the Contact Number">
                 </div>
                 <div class="fields">
                  <label for="Flat name">Image</label><br>
                  <img style="height:150px ;width:200px" src="<?php echo $image ?>" alt="">
                  <input type="file"
                        id="flat_image"
                        name="flat_image"
                        class="form-control"
                        placeholder="Choose File">
                 </div>
                 <div class="fields">
                 <label for="more_image">More Images</label><br>
              <?php
               for($i=0;$i<$count;++$i)
            {
              ?>  
                <br><img src="flat_images/<?= $img[$i]?>" height="100px" width="100px"/>
               <?php
            }
            ?>
                 <input type="file"
                       id="more_image[]"
                       class="form-control"
                       name="more_image[]"
                       placeholder="Choose File"
                       multiple/>
                </div>
                <div style="color: antiquewhite;font-size: 20px;" >           
                  <label for="Flat name">Ammenities</label>
                  <textarea
                        id="ammenities"
                        name="ammenities"
                        class="form-control"
                        placeholder="Ammenities available"><?php echo $ammenities?></textarea>
</div>
                </div>
                <button class="btn" type="submit" name="save"><b><i>Save</b></i></button>
    </div>
</form>
</body>
<script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ammenities');
        

        function validateNumber(input) {
        var re = /^(\d{3})[- ]?(\d{3})[- ]?(\d{4})$/

        return true;
      }
function validateForm() {
var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

let name = document.forms["form"]["name"].value;
let builder_name = document.forms["form"]["builder_name"].value;
let rooms = document.forms["form"]["rooms"].value;
let price = document.forms["form"]["price"].value;
let address = document.forms["form"]["address"].value;
let contact_builder = document.forms["form"]["contact_builder"].value;
let ammenities=document.forms["form"]["ammenities"].value;


if(name=="" || name.length<6)
{
alert("Enter Valid Name!");
document.form.name.focus() ;
return false;
}

  else if (builder_name == "" || builder_name.length<6) {
    alert("Enter Valid Name of Builder!");
    document.form.builder_name.focus() ;
    return false;
  }
  else if(rooms="" || rooms.match(/^\d+/))
  {
    alert("Please only enter numeric characters only for Rooms! (Allowed input:0-9)");
    document.form.rooms.focus() ;
    return false;
  }
  else if(price="" || price.match(/^\d+/) || price.length<10)
  {
    alert("Please only enter valid pricing");
    document.form.price.focus() ;
    return false;
  }
  else if(address="" || address.length<6)
  {
    alert("Please enter valid address");
    document.form.address.focus() ;
    return false;
  }
 else if(contact_builder=="" || contact_builder.length<10 || !validateNumber(contact_builder))
{
alert("Enter Valid Phone Number!");
document.form.contact_builder.focus() ;
return false;
}
else if(ammenities="" || ammenities.length<100)
  {
    alert("Please enter valid ammenities");
    document.form.ammenities.focus() ;
    return false;
  }
}
    </script>
</html>