<?php
include 'db.php';
$name="";
$ownername = "";
$address="";
$location="";
$price = "";
$rooms="";
$securitydeposit="";
$wateravailable="";
$ammenities="";
$contact_builder="";
$more_image="";

if (isset($_POST['save'])) {
$name = mysqli_real_escape_string($con, $_POST['name']);    
  $ownername = mysqli_real_escape_string($con, $_POST['owner_name']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  $price = mysqli_real_escape_string($con, $_POST['rent_price']);
  $rooms = mysqli_real_escape_string($con, $_POST['rooms']);
  $wateravailable = mysqli_real_escape_string($con, $_POST['water_available']);
  $securitydeposit = mysqli_real_escape_string($con, $_POST['security_deposit']);
  $ammenities = mysqli_real_escape_string($con, $_POST['ammenities']);

  $contact_owner = mysqli_real_escape_string($con, $_POST['contact_owner']);

  $filename = $_FILES['rent_image']['name'];
  $tempname = $_FILES['rent_image']['tmp_name'];
  $folder = "rent_images/" . $filename;
  move_uploaded_file($tempname, $folder);


  $more_image=$_FILES['more_image'];
  $file='';
  $file_tmp='';
  $location1="rent_images/";
  $data='';
  foreach($_FILES['more_image']['name'] as $key=>$val)
 {
  $file=$_FILES['more_image']['name'][$key];
  $file_tmp=$_FILES['more_image']['tmp_name'][$key];
  move_uploaded_file($file_tmp,$location1.$file);
  $data .=$file." ";
 }


  $q = " INSERT INTO `rents`(`name`,`owner_name`, `address`, `location`, `rent_price`, `rooms`, `security_deposit`, `water_available`, `ammenities`, `contact_owner`, `rent_image`,`more_image`)VALUES ('$name','$ownername','$address','$location','$price','$rooms','$securitydeposit','$wateravailable','$ammenities','$contact_owner','$folder','$data')";
  $query=mysqli_query($con, $q);
    if ($query) {
        header('location:rent_table.php');
        exit;
    } else {
        echo "<script>alert('Data not submitted')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="rent.css">
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
      <h2 class="title" style="text-align:center;">ADD RENT</h2>
     <p style="text-align:center"></p>
      
      <div class="user-info">
      <div class="fields">
                  <label for="Flat name">Name</label>
                  <input type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Enter the Name ">
                 </div>
            <div class="fields">
                  <label for="Flat name">Name of Owner</label>
                  <input type="text"
                        id="owner_name"
                        name="owner_name"
                        class="form-control"
                        placeholder="Enter the Owner Name ">
                 </div>
                 <div class="fields">
                  <label for="Builder name">Address</label>
                  <input type="text"
                        id="address"
                        name="address"
                        class="form-control"
                        placeholder="Enter the Address">
                 </div>
                 <div class="fields">
                  <label for="Location">Location</label>
                  <!-- <input type="text"
                        id="location"
                        name="location"
                        class="form-control"
                        placeholder="Enter the Location"> -->
                        <select class="form-control" name="location" id="location">
  <option class="form-control" value="Bangalore">Bangalore</option>
  <option class="form-control" value="Pune">Pune</option>
</select>
                 </div>
                 <div class="fields">
                  <label for="rent_price">Monthly Rent</label>
                  <input type="text"
                        id="rent_price"
                        name="rent_price"
                        class="form-control"
                        placeholder="Enter the Monthly Rent">
                 </div>
                 <div class="fields">
                  <label for="Location">Rooms</label>
                  <input type="text"
                        id="rooms"
                        name="rooms"
                        class="form-control"
                        placeholder="Enter the Number of Rooms">
                 </div>
                 <div class="fields">
                  <label for="security_deposit">Security deposit for Rent</label>
                  <input type="text"
                        id="security_deposit"
                        name="security_deposit"
                        class="form-control"
                        placeholder="Enter the Security Deposit for Rent">
                 </div>
                 <div class="fields">
                  <label for="water_available">Availability of Water</label>
                  <input type="text"
                        id="water_available"
                        name="water_available"
                        class="form-control"
                        placeholder="Enter the Flat Location">
                 </div>
                 <div class="fields">
                 <label for="Flat name">Contact of Owner</label>
                 <input type="text"
                       id="contact_owner"
                       class="form-control"
                       name="contact_owner"
                       placeholder="Owner Contact Number">
                </div>
                 <div class="fields">
                  <label for="Flat name">Image</label>
                  <input type="file"
                        id="rent_image"
                        class="form-control"
                        name="rent_image"
                        placeholder="Choose File">
                 </div>
                 <div class="fields">
                 <label for="more_image">More Images</label>
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


let owner_name = document.forms["form"]["owner_name"].value;
let rent_price = document.forms["form"]["rent_price"].value;
let rooms = document.forms["form"]["rooms"].value;
let security_deposit = document.forms["form"]["security_price"].value;
let water = document.forms["form"]["water_available"].value;
let address = document.forms["form"]["address"].value;
let contact_owner = document.forms["form"]["contact_owner"].value;
let ammenities=document.forms["form"]["ammenities"].value;


   if (owner_name == "" || builder_name.length<6) {
    alert("Enter Valid Name of Builder!");
    document.form.owner_name.focus() ;
    return false;
  }

  else if(rent_price="" || rent_price.match(/^\d+/) || rent_price.length<6)
  {
    alert("Please only enter valid pricing");
    document.form.rent_price.focus() ;
    return false;
  }
  
  else if(rooms="" || rooms.match(/^\d+/) || rooms.length<10)
  {
    alert("Please only enter valid rooms");
    document.form.rooms.focus() ;
    return false;
  }
  else if(security_deposit="" || security_deposit.match(/^\d+/) || security_deposit.length<6)
  {
    alert("Please only enter valid pricing");
    document.form.security_deposit.focus() ;
    return false;
  }
  else if(water="" || water.length<6)
  {
    alert("Please enter valid address");
    document.form.water.focus() ;
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