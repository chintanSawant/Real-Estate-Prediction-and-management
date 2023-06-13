
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
$id = $_GET['rent_id'];
$q = "SELECT * FROM `rents` where rent_id=$id";

$query = mysqli_query($con, $q);
while ($res = mysqli_fetch_array($query)) {
$name=$res['name'];
    $ownername = $res['owner_name'];
    $address = $res['address'];
    $location = $res['location'];
    $price = $res['rent_price'];
    $rooms = $res['rooms'];
    $securitydeposit = $res['security_deposit'];
    $wateravailable = $res['water_available'];
    $ammenities = $res['ammenities'];
    $contact_owner = $res['contact_owner'];
    $image=$res['rent_image'];
    $more_image=['more_image'];
    $img=$res['more_image'];
    $img=explode(" ",$img);
    $count=count($img)-1;
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
<html>
	<title>disr</title>
<head>
	<!-- Meta Tags 
	=====================================-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- site title
	==================================== -->
	<title>Web site</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Custom Style Sheet
	==================================== -->
	<link rel="stylesheet" type="text/css" href="website/css/style.css">
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
</style>
</head>
<body style="background: rgb(225, 223, 220);">
	<!-- Navbar
	=========================== -->
	<header>
		<nav class="navbar py-2">
			<a href="">
				<h1>
					<span class="white">Real Estate</span>
					<span class="red"></span>
					<span class="white"></span>
				</h1>
			</a>
			<ul class="m-0">
				<li><a href="REPP PROJ/index.html" class="white active">Home</a></li>
				<li><a href="" class="white">Home Loan</a></li>
				<li><a href="" class="white">Sell Property</a></li>
				<li><a href="" class="white">Log out</a></li>
				

			</ul>
		</nav>
	</header>
	<!-- Banner Section -->
	<section class="banner">
		<div>
		
			<h1 class="red"><?php echo $name?></h1>
		</div>
	</section>
	
	</section>
	<!-- about detail -->
	<section class="about">
	<p>
	<img src="admin/<?php echo $image ?>" style="margin-left:100px;" width=80%; height=400px;; alt="image" onclick="openModal(this)">
	</p>
		<div class="section-heading">
			<h1 class="red"> Details</h1>
		</div>
		<style>
			.images {
				display: flex;
				flex-wrap: wrap;
				margin: 0 50px;
				padding: 30px;
			}
	  
			.photo {
				max-width: 31.333%;
				padding: 0 10px;
				height: 240px;
			}
	  
			.photo img {
				width: 350px;
				height: 300px;
			}
		</style>
		 <div class="images">
		 <?php
               for($i=0;$i<$count;++$i)
            {
              ?> 
			<div class="photo">
			 
                <img src="admin/rent_images/<?= $img[$i]?>" onclick="openModal(this)"/>
              
			</div>
			<?php
          
		}
            ?>
	  
			
		</div>
		<div class="about-main">
			<div class="about-text">
				<h2>Amenities</h2>
				<style>
					body {
					  font-family: Arial, Helvetica, sans-serif;
					}
					
					.flip-card {
					  background-color: transparent;
					  width: 150px;
					  height: 150px;
					  perspective: 1000px;
					}
					
					.flip-card-inner {
					  position: relative;
					  width: 100%;
					  height: 100%;
					  text-align: center;
					  transition: transform 0.6s;
					  transform-style: preserve-3d;
					  box-shadow: 0 4px 8px 0 rgb(0, 0, 0);
					  border: black 2px solid;
					  border-radius: 5px;
					}
					
					.flip-card:hover .flip-card-inner {
					  transform: rotateY(180deg);
					}
					
					.flip-card-front, .flip-card-back {
					  position: absolute;
					  width: 100%;
					  height: 100%;
					  -webkit-backface-visibility: hidden;
					  backface-visibility: hidden;
					}
					
					.flip-card-front {
					  background-color: #0000004b;
					  color: black;
					}
					
					.flip-card-back {
					  background-color: #2980b9;
					  color: white;
					  text-align: center;
					  transform: rotateY(180deg);
					}
					</style>
			<div class="row">
				<div class="flip-card">
				  <div class="flip-card-inner">
					<div class="flip-card-front">
					  <img src="website/images/hotel1.png" alt="" style="width:150px;height:150px;">
					</div>
					<div class="flip-card-back">
					  <p>HOTEL</p> 
					</div>
				  </div>
				</div>
				<div class="flip-card">
					<div class="flip-card-inner">
					  <div class="flip-card-front">
						<img src="website/images/school.png" alt="" style="width:150px;height:150px;">
					  </div>
					  <div class="flip-card-back">
						<p>SCHOOL</p> 
					  </div>
					</div>
				  </div>
				  <div class="flip-card">
					<div class="flip-card-inner">
					  <div class="flip-card-front">
						<img src="website/images/hospital.png" alt="" style="width:150px;height:150px;">
					  </div>
					  <div class="flip-card-back">
						<p>HOSPITAL</p> 
					  </div>
					</div>
				  </div>
				  <div class="flip-card">
					<div class="flip-card-inner">
					  <div class="flip-card-front">
						<img src="website/images/bus1.png" alt="" style="width:150px;height:150px;">
					  </div>
					  <div class="flip-card-back">
						<p>BUS STAND</p> 
					  </div>
					</div>
				  </div>
				  <div class="flip-card">
					<div class="flip-card-inner">
					  <div class="flip-card-front">
						<img src="website/images/pool1.png" alt="" style="width:150px;height:150px;">
					  </div>
					  <div class="flip-card-back">
						<p>POOL</p> 
					  </div>
					</div>
				  </div>
				  <div class="flip-card">
					<div class="flip-card-inner">
					  <div class="flip-card-front">
						<img src="website/images/shopping.png" alt="" style="width:150px;height:150px;">
					  </div>
					  <div class="flip-card-back">
						<p>MALL</p> 
					  </div>
					</div>
				  </div>
				  
				</div>	
	<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
      <img id="modalImage" src="" alt="Modal Image">
    </div>
  </div>
			<hr style="margin-left:0px;height:6px;border-width:0;color:gray;background-color:black;margin-right:300px">
				<h2>About</h2>
				<hr style="margin-left:0px;height:6px;border-width:0;color:gray;background-color:black;margin-right:300px">
				<ul class="list">
					<li class="red" style="font-size: 20px; font-weight: 1000;">ADDRESS</li>
					<p style="font-size:40px;"> <?php echo $address ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;"> CITY </li>
					<p style="font-size:40px;"> <?php echo $location ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;">OWNER NAME</li>
					<p style="font-size:40px;"> <?php echo $ownername ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;">RENT PER MONTH</li>
					<?php 
                              $price = $price; // 15 lakhs
                              $convertedPrice = formatPrice($price);
                              ?>
					<p style="font-size:40px;">₹ <?php echo $convertedPrice ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;">ROOMS</li>
					<p style="font-size:40px;"> <?php echo $rooms ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;">SECURITY DEPOSIT</li>
					<p style="font-size:40px;">₹ <?php echo $securitydeposit ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;">WATER AVAILABILITY</li>
					<p style="font-size:40px;">₹ <?php echo $wateravailable ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;">AMMENITIES</li>
					<p style="font-size:40px;"> <?php echo $ammenities ?></p>
					<li class="red" style="font-size: 20px; font-weight: 1000;">CONTACT OWNER</li>
					<a href="tel:<?php echo $contact_owner ?>" style="font-size:40px;color:black" title="Call"><i class="fa fa-phone"> </i> <?php echo  $contact_owner ?></a>

				</ul>
			</div>
		</div>
	</section>
	<!-- footer section -->
	<footer style="background: rgba(51, 0, 255, 0.542);">
		<p>COPYRIGHT © 2023 Real Estate Price Prediction- DESIGN: <a href="" class="red">PAANC</a></p>
	</footer>
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