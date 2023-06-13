
<?php
include 'db.php';
$name="";
$area = "";
$owner="";
$address = "";
$price = "";
$geography="";
$type="";
$soil="";
$location="";
$ammenities="";
$contact_owner="";

if (isset($_POST['save'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $area = mysqli_real_escape_string($con, $_POST['area']);
  $owner = mysqli_real_escape_string($con, $_POST['owner_name']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $geography=mysqli_real_escape_string($con, $_POST['geography']);
  $price = mysqli_real_escape_string($con, $_POST['price']);
  $type = mysqli_real_escape_string($con, $_POST['type']);
  $soil = mysqli_real_escape_string($con, $_POST['soil']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  $contact_owner = mysqli_real_escape_string($con, $_POST['contact_owner']);
  $ammenities = mysqli_real_escape_string($con, $_POST['ammenities']);
  $filename = $_FILES['land_image']['name'];
  $tempname = $_FILES['land_image']['tmp_name'];
  $folder = "land_images/" . $filename;
  move_uploaded_file($tempname, $folder);



  $q = "INSERT INTO `land`(`name`,`area`, `owner_name`, `address`, `price`, `geography`, `type`, `soil`, `ammenities`, `location`, `contact_owner`, `land_image`) VALUES ('$name','$area','$owner','$address','$price','$geography','$type','$soil','$ammenities','$location','$contact_owner','$folder')";
  $query=mysqli_query($con, $q);
    if ($query) {
        header('location:land_table.php');
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

<div class="container" style="height:1200px">
    <form action="#" method='post' name="form" onsubmit="return validateForm();" autocomplete="off" enctype="multipart/form-data" class="form">
      <h2 class="title" style="text-align:center;">ADD LAND</h2>
     <p style="text-align:center"></p>
      
      <div class="user-info">
      <div class="fields">
                  <label for="Flat name"> Name</label>
                  <input type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Enter the Name of Land">
                 </div>
            <div class="fields">
                  <label for="Flat name"> Area</label>
                  <input type="text"
                        id="area"
                        name="area"
                        class="form-control"
                        placeholder="Enter the Area in sqft">
                 </div>
                 <div class="fields">
                  <label for="Builder name">Owner Name</label>
                  <input type="text"
                        id="owner_name"
                        name="owner_name"
                        class="form-control"
                        placeholder="Enter the Owner Name">
                 </div>
                 <div class="fields">
                  <label for="Flat name">Address</label>
                  <input type="text"
                        id="address"
                        name="address"
                        class="form-control"
                        placeholder="Enter the Address">
                 </div>
                 <div class="fields">
                  <label for="Flat name">Location</label>
                 <select class="form-control" name="location" id="location">
  <option class="form-control" value="Bangalore">Bangalore</option>
  <option class="form-control" value="Pune">Pune</option>
</select>
</div>    
                 <div class="fields">
                  <label for="Price">Price</label>
                  <input type="text"
                        id="price"
                        name="price"
                        class="form-control"
                        placeholder="Enter the Land Price">
                 </div>
               
                 <div class="fields">
                  <label for="Flat name">Geography of Land</label>
                 <select class="form-control" name="geography" id="geography">
  <option class="form-control" value="Slope">Slope</option>
  <option class="form-control" value="Plain">Plain</option>
</select>
</div>    
<div class="fields">
                  <label for="Flat name">Type of Land</label>
                 <select class="form-control" name="type" id="type">
  <option class="form-control" value="Agricultural">Agricultural</option>
  <option class="form-control" value="Barren">Barren</option>
</select>
</div>              
<div class="fields">
                  <label for="Flat name">Type of Soil</label>
                 <select class="form-control" name="soil" id="soil">
  <option class="form-control" value="Clay">Clay</option>
  <option class="form-control" value="Sandy">Sandy</option>
  <option class="form-control" value="Loamy">Loamy</option>
</select>
</div>         
                <div class="fields">

                  <label for="Flat name">Contact of Owner</label>
                  <input type="text"
                        id="contact_owner"
                        name="contact_owner"
                        class="form-control"
                        placeholder="Enter the Contact Number">
                 </div>
                 
                 <div class="fields">
                  <label for="Flat name">Image</label>
                  <input type="file"
                        id="land_image"
                        name="land_image"
                        class="form-control"
                        placeholder="Choose File">
                 </div>
                <div style="color: antiquewhite;font-size: 20px;" >           
                  <label for="Flat name">Ammenities</label>
                  <textarea
                        id="ammenities"
                        name="ammenities"
                        class="form-control"
                        placeholder="Ammenities available"></textarea>
</div>
</div>
                
                <button class="btn" type="submit" name="save"><b><i>Save</b></i></button>
    </div>
</form>
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
let owner_name = document.forms["form"]["owner_name"].value;
let area = document.forms["form"]["area"].value;
let price = document.forms["form"]["price"].value;
let address = document.forms["form"]["address"].value;
let contact_owner = document.forms["form"]["contact_owner"].value;
let ammenities=document.forms["form"]["ammenities"].value;


if(name=="" || name.length<6)
{
alert("Enter Valid Name!");
document.form.name.focus() ;
return false;
}

  else if (owner_name == "" || builder_name.length<6) {
    alert("Enter Valid Name of Builder!");
    document.form.owner_name.focus() ;
    return false;
  }
  else if(area="" || area.match(/^\d+/) || area.length<5)
  {
    alert("Please only enter numeric characters only for Rooms! (Allowed input:0-9)");
    document.form.area.focus() ;
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
 else if(contact_owner=="" || contact_owner.length<10 || !validateNumber(contact_owner))
{
alert("Enter Valid Phone Number!");
document.form.contact_owner.focus() ;
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
</body>

</html>