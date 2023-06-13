<?php
include 'db.php';
session_start();

$user=$_SESSION['user'];
if($user==true)
{


}
else
{
  header('location:login.php');
}
?>
<?php
                $limit = 8;
                $page = 1;
                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                }
                $offset = ($page - 1) * $limit;
        
                $q = "SELECT * FROM `land` ORDER BY `land_id`  LIMIT  {$offset},{$limit}";
                $flat_data=array();
$res = mysqli_query($con, $q);
while ($row = mysqli_fetch_assoc($res)) {
  $land_data[] = $row;
}
?>
<?php
include 'db.php';

$type = "";
$price="";
$location="";

if (isset($_POST['check'])) {
  $type = mysqli_real_escape_string($con, $_POST['type']);
  $price = mysqli_real_escape_string($con, $_POST['price']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  
  $q="SELECT * FROM `land` WHERE `type`='$type' OR `location`='$location' OR `price` < '$price'";
  $query=mysqli_query($con, $q);
  $land_data=array();
while ($row = mysqli_fetch_assoc($query)) {
  $land_data[] = $row;
}
}
?>
<?php 
  function formatPrice($price) {
    if ($price >= 10000000) {
        return round($price / 10000000, 2) . ' crore';
    } elseif ($price >= 100000) {
        return round($price / 100000, 2) . ' lakh';
    } 
		else if($price>=1000){
			return round($price / 1000, 2) . ' thousand';

		}
	else {
        return $price;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="css/style.css" rel="stylesheet" />
    <link href="options.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="website/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>LANDS</title>
    <style>
  .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    .modal-content img {
      width: 100%;
      height: auto;
    }

    .close {
      color: #fff;
      position: absolute;
      top: 15px;
      right: 35px;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }

    .parent{
      margin: 1rem;
      text-align: center;
    }
    .child{
      display: inline-block;
      padding: 1rem 1rem;
      vertical-align: middle;
    }
</style>
</head>
<body>
<nav class="navbar py-2">
			<a href="">
				<h1>
					<span class="white">Real Estate</span>
					<span class="red"></span>
					<span class="white"></span>
				</h1>
			</a>
			<ul class="m-0"style="font-size:20px">
				<li><a href="index.php" class="white active">Home</a></li>
				<li><a href="flat1.php" class="white">Flat</a></li>
				<li><a href="villa1.php" class="white">Villa</a></li>
        <li><a href="rent1.php" class="white">Rent</a></li>
        <li><a href="land1.php" class="white">Land</a></li>
				<li><a href="logout.php" class="white">Log out</a></li>
			</ul>
		</nav>
      <div class="heading_container">
        <h2 style="font-size:40px;text-align:center">
          Lands Available For Sale
        </h2>
      </div>
      <hr style="margin-bottom:10px;margin-left:30px;height:6px;border-width:0;color:gray;background-color:SlateBlue;margin-right:30px">
      <br>



      <form action="#" method='post' enctype="multipart/form-data">
      <div class="parent">
        <div class="child">
      <label for="Flat name">Location:</label>
                 <select class="form-control" name="location" id="location">
  <option class="form-control" value="Bangalore">Bangalore</option>
  <option class="form-control" value="Pune">Pune</option>
</select>
</div>
<div class="child">
<label for="Flat name">Price:</label>
                 <select class="form-control" name="price" id="price">
  <option class="form-control" value="1000000">less than 1000000</option>
  <option class="form-control" value="3000000">less than 3000000</option>
  <option class="form-control" value="5000000">less than 5000000</option>
  <option class="form-control" value="10000000">less than 10000000</option>
</select>
</div>
<div class="child">
<label for="Flat name">Land Type:</label>
                 <select class="form-control" name="type" id="type">
  <option class="form-control" value="Barren">Barren</option>
  <option class="form-control" value="Agricultural">Agricultural</option>
</select> 
</div>
 <div class="child">
  <br>
<button class="btn btn-primary" type="submit" name="check">Show Results</button>
  </div>
</div>
  </form>


      <?php
                    foreach ($land_data as $key => $value) {
                    ?>
    <div class="property-box"style="margin-top:20px;background:#FFFF99">
        <div class="property-box__left">  
        <img src="admin/<?php echo $value['land_image'] ?>"  onclick="openModal(this)" alt="" />
        </div>
        <div class="property-box__right">
            <div class="property-box__title h3">
            <a href="disl.php?land_id=<?php echo $value['land_id']?>"><?php echo $value['name']?>,<?php echo $value['location']?></a>
            </div>
            <div class="property-box__amenities"style="color:black">
            <span>Area:<?php echo $value['area']."sqfts"?></span>
            </div>
            <div class="property-box__post-price">
                <div class="property-box__post-by"style="color:black">
                Type: <?php echo $value['type']?>
                </div>
                <?php 
                              $price = $value['price']; // 15 lakhs
                              $convertedPrice = formatPrice($price);
                              ?>
                <div class="property-box__price">
                <span class="badge"style="background:black">Rs.<?php echo $convertedPrice?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
                    }
                    ?>
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
      <img id="modalImage" src="" alt="Modal Image">
    </div>
  </div>
<p style="text-align:center">
        <?php
        $s1 = "SELECT * FROM land";
        $que = mysqli_query($con, $s1);

        $totalrecords = mysqli_num_rows($que);


        $totalpage = ceil($totalrecords / $limit);



        for ($i = 1; $i <= $totalpage; $i++) {

          echo '  <a href="land1.php?page='.$i.'" class="btn btn-info ">'.$i.'</a>';
        }
        ?>
      </p> 
    <section class="container-fluid footer_section ">
        <div class="container">
          <p>
           Made with ❤️ by Nirzar, Prabhakar,Ashish, Avishka, Chintan
          </p>
        </div>
      </section>
      <script>
    function openModal(img) {
      var modal = document.getElementById("myModal");
      var modalImg = document.getElementById("modalImage");

      modal.style.display = "block";
      modalImg.src = img.src;
    }

    function closeModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "none";
    }
</script>
</body>
</html>



