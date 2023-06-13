<?php
include 'db.php';

$id = $_GET['id'];
$name = "";
$agent = "";
$address = "";
$location="";
$price="";
$ammenities="";
$furnished_status="";
$contact_agent="";
$more_image="";
$q = "SELECT * FROM `villa` where villa_id=$id";

$query = mysqli_query($con, $q);
while ($res = mysqli_fetch_array($query)) {

    $name = $res['name'];
    $agent = $res['agent'];
    $address = $res['address'];
    $location=$res['location'];
    $price=$res['price'];
    $ammenities=$res['ammenities'];
    $furnished_status=$res['furnished_status'];
    $contact_agent=$res['contact_agent'];
    $image=$res['villa_image'];
    $more_image=['more_image'];
    $img=$res['more_image'];
    $img=explode(" ",$img);
    $count=count($img)-1;
}
?>
<?php
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $agent = mysqli_real_escape_string($con, $_POST['agent']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $location=mysqli_real_escape_string($con,$_POST['location']);
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
    $data1='';
    foreach($_FILES['more_image']['name'] as $key=>$val)
   {
    $file=$_FILES['more_image']['name'][$key];
    $file_tmp=$_FILES['more_image']['tmp_name'][$key];
    move_uploaded_file($file_tmp,$location1.$file);
    $data1 .=$file." ";
   }



    if ($_FILES['villa_image']['error'] != 4 && $_FILES['more_image']['error']!=4 )
        $q = " UPDATE `villa` SET `villa_id`='$id',`name`='$name',`agent`='$agent',`address`='$address',`location`='$location',`price`='$price',`ammenities`='$ammenities',`furnished_status`='$furnished_status',`contact_agent`='$contact_agent',`villa_image`='$folder',`more_image`='$data'  WHERE villa_id=$id";
    else
         $q = " UPDATE `villa` SET `villa_id`='$id',`name`='$name',`agent`='$agent',`address`='$address',`location`=$location,`price`='$price',`ammenities`='$ammenities',`furnished_status`='$furnished_status',`contact_agent`='$contact_agent' WHERE villa_id=$id";
    $query = mysqli_query($con, $q);
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
    <div class="container" style="height:900px">
      <form action="#" method='post' autocomplete="off" enctype="multipart/form-data" class="form">
        <h2 class="title" style="text-align:center;">UPDATE VILLA</h2>
       <p style="text-align:center"></p>
        
        <div class="user-info">
              <div class="fields">
                    <label for="Flat name">Name of Villa</label>
                    <input type="text"
                          id="name"
                          name="name"
                          value="<?php echo $name ?>"
                          class="form-control"
                          placeholder="Enter the Villa Name ">
                   </div>
                   <div class="fields">
                    <label for="Builder name">Name of Agent</label>
                    <input type="text"
                          id="agent"
                          name="agent"
                          class="form-control"
                          value="<?php echo $agent ?>"
                          placeholder="Enter the Agent Name">
                   </div>
                   <div class="fields">
                    <label for="Rooms">Address</label>
                    <input type="text"
                          id="address"
                          name="address"
                          class="form-control"
                          value="<?php echo $address ?>"
                          placeholder="Enter the Address">
                   </div>
                   <div class="fields">
                    <label for="Price">Price</label>
                    <input type="text"
                          id="price"
                          name="price"
                          value="<?php echo $price ?>"
                          class="form-control"
                          placeholder="Enter the Price">
                   </div>
                  
                   <div class="fields">
                    <label for="Flat name">Location of Villa</label>
                  
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
                    <label for="Flat name">Furnished Status</label>
                          <select class="form-control" value="<?php echo $furnished_status; ?>" name="furnished_status" id="furnished_status">
  <option class="form-control" value="Furnished">Furnished</option>
  <option class="form-control" value="Unfurnished">Unfurnished</option>
                 </select>
                   </div>
                   <div class="fields">
                   <label for="Flat name">Contact of Agent</label>
                   <input type="text"
                         id="contact_agent"
                         class="form-control"
                         name="contact_agent"
                         value="<?php echo $contact_agent ?>"
                         placeholder="Agent Contact Number">
                  </div>
                  <div class="fields">
                    <label for="Flat name">Ammenities</label>
                    <textarea
                          id="ammenities"
                          class="form-control"
                          name="ammenities"
                          placeholder="Ammenities Available"><?php echo $ammenities ?></textarea>
                   </div>
                   <div class="fields">
                    <label for="Flat name">Image</label>
                    <img style="height:200px ;width:250px" src="<?php echo $image ?>" alt=""><br>
                    <input type="file"
                          id="villa_image"
                          class="form-control"
                          name="villa_image"
                          placeholder="Choose File">
                   </div>
                   <div class="fields">
                 <label for="more_image">More Images</label><br>
              <?php
               for($i=0;$i<$count;++$i)
            {
              ?>  
                <img src="villa_images/<?= $img[$i]?>" height="100px" width="100px"/>
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
                  </div>
                  <button class="btn" type="submit" name="save"><b><i>Save</b></i></button>
      </div>
  </form>
  <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ammenities');
    </script>

  
      
  </body>
  
  </html>
