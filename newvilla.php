<?php
include 'db.php';
$name = "";
$agent = "";
$address = "";
$location="";
$price="";
$ammenities="";
$furnished_status="";
$contact_agent="";


if (isset($_POST['save'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $agent = mysqli_real_escape_string($con, $_POST['agent']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  $price = mysqli_real_escape_string($con, $_POST['price']);
  $ammenities = mysqli_real_escape_string($con, $_POST['ammenities']);
  $furnished_status = mysqli_real_escape_string($con, $_POST['furnished_status']);
  $contact_agent = mysqli_real_escape_string($con, $_POST['contact_agent']);

  $filename = $_FILES['villa_image']['name'];
  $tempname = $_FILES['villa_image']['tmp_name'];
  $folder = "villa_images/" . $filename;
  move_uploaded_file($tempname, $folder);

  $more_image=$_FILES['more_image'];
	 $file='';
	 $file_tmp='';
	 $location1="villa_images/";
	 $data='';
	 foreach($_FILES['more_image']['name'] as $key=>$val)
	{
	 $file=$_FILES['more_image']['name'][$key];
	 $file_tmp=$_FILES['more_image']['tmp_name'][$key];
	 move_uploaded_file($file_tmp,$location1.$file);
	 $data .=$file." ";
	}

  $q = " INSERT INTO `villa`(`name`, `agent`, `address`,`location`, `price`, `ammenities`, `furnished_status`, `contact_agent`, `villa_image`,`more_image`) VALUES ('$name','$agent','$address','$location','$price','$ammenities','$furnished_status','$contact_agent','$folder','$data')";
  $query=mysqli_query($con, $q);
    if ($query) {
        header('location:villa_table.php');
        exit;
    } else {
        echo "<script>alert('Data not submitted')</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="vila.css">
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
      <form action="#" method='post'  name="form" onsubmit="return validateForm();"  autocomplete="off" enctype="multipart/form-data" class="form">
        <h2 class="title" style="text-align:center;">ADD VILLA</h2>
       <p style="text-align:center"></p>
        
        <div class="user-info">
              <div class="fields">
                    <label for="Flat name">Name of Villa</label>
                    <input type="text"
                          id="name"
                          name="name"
                          class="form-control"
                          placeholder="Enter the Villa Name ">
                   </div>
                   <div class="fields">
                    <label for="Builder name">Name of Agent</label>
                    <input type="text"
                          id="agent"
                          name="agent"
                          class="form-control"
                          placeholder="Enter the Agent Name">
                   </div>
                   <div class="fields">
                    <label for="Rooms">Address</label>
                    <input type="text"
                          id="address"
                          name="address"
                          class="form-control"
                          placeholder="Enter the Address">
                   </div>
                   <div class="fields">
                    <label for="Rooms">Location</label>
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
                    <label for="Price">Price</label>
                    <input type="text"
                          id="price"
                          name="price"
                          class="form-control"
                          placeholder="Enter the Price of Villa">
                   </div>
                  
                   <div class="fields">
                    <label for="Flat name">Location of Villa</label>
                    <input type="text"
                          id="location"
                          name="location"
                          class="form-control"
                          placeholder="Enter the Villa Location">
                   </div>
                   <div class="fields">
                    <label for="Flat name">Furnished Status</label>
                    <input type="text"
                          id="furnished_status"
                          name="furnished_status"
                          class="form-control"
                          placeholder="Enter the Furniture Status">
                   </div>
                   <div class="fields">
                   <label for="Flat name">Contact of Agent</label>
                   <input type="text"
                         id="contact_agent"
                         class="form-control"
                         name="contact_agent"
                         placeholder="Enter the Agent Contact Number">
                  </div>
                   <div class="fields">
                    <label for="Flat name">Image</label>
                    <input type="file"
                          id="villa_image"
                          class="form-control"
                          name="villa_image"
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

let name = document.forms["form"]["name"].value;
let agent = document.forms["form"]["agent"].value;
let price = document.forms["form"]["price"].value;
let address = document.forms["form"]["address"].value;
let contact_agent = document.forms["form"]["contact_agent"].value;
let ammenities=document.forms["form"]["ammenities"].value;


if(name=="" || name.length<6)
{
alert("Enter Valid Name!");
document.form.name.focus() ;
return false;
}

  else if (agent == "" || agent.length<6) {
    alert("Enter Valid Name of Agent!");
    document.form.agent.focus() ;
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
 else if(contact_agent=="" || contact_agent.length<10 || !validateNumber(contact_agent))
{
alert("Enter Valid Phone Number!");
document.form.contact_agent.focus() ;
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
