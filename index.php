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
$q = "SELECT * FROM `flats`LIMIT 2";
$res = mysqli_query($con, $q);
$product_data = array();
while ($row = mysqli_fetch_assoc($res)) {
  $flat_data[] = $row;
}
?>
<?php
include 'db.php';
?>
<?php
$q = "SELECT * FROM `villa`LIMIT 2";
$res = mysqli_query($con, $q);
$product_data = array();
while ($row = mysqli_fetch_assoc($res)) {
  $villa_data[] = $row;
}
?>
<?php
$q = "SELECT * FROM `rents`LIMIT 2";
$res = mysqli_query($con, $q);
$product_data = array();
while ($row = mysqli_fetch_assoc($res)) {
  $rent_data[] = $row;
}
?>
<?php
$q = "SELECT * FROM `land`LIMIT 2";
$res = mysqli_query($con, $q);
$product_data = array();
while ($row = mysqli_fetch_assoc($res)) {
  $land_data[] = $row;
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

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Real Estate Price Prediction</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
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

<body>
  <div class="hero_area">





    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="images/real-estate-price-prediction-logo.png" alt="" />
          </a>
          <div class="navbar-collapse" id="">
            <ul class="navbar-nav justify-content-between ">
              <div class="User_option">
                <li class="">
                  <a style="color:black;font-weight:bold;font-size:25px;onmouseover="this.style.color='blue' onmouseout="this.style.color='black'" class="mr-4" href="index.php">
                    Home
                  </a>
                  <a style="color:black;font-weight:bold;font-size:25px;onmouseover="this.style.color='blue' onmouseout="this.style.color='black'" class="mr-4" href="loan.php">
                    Home Loan
                  </a>
                  <a style="color:black;font-weight:bold;font-size:25px;onmouseover="this.style.color='blue' onmouseout="this.style.color='black'"class="mr-4" href="options.php">
                    Estimate
                  </a>
                  <a style="color:black;font-weight:bold;font-size:25px;onmouseover="this.style.color='blue' onmouseout="this.style.color='black'" class="mr-4" href="2buttons.php">
                    Sell Property
                  </a>
                  <a style="color:black;font-weight:bold;font-size:25px;onmouseover="this.style.color='blue' onmouseout="this.style.color='#FDFF00'"class="mr-4" href="logout.php">
                    Logout
                  </a>
                </li>
              </div>
            </ul>

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">Home</a>
                <a href="loan.php">Home Loan</a>
                <a href="options.php">Estimate</a>
                <a href="2buttons.php">Sell Property</a>
                <a href="logout.php">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-1">
            <div class="detail-box">
              <h1>
                <span> Easy way to find Perfect</span> <br>
                Property <br>
              
              </h1>
              <p>
                We provide a complete service for a sale, purchase or rental of Real Estate, along with Machine learning Based Price Prediction!
              </p>
              <div class="btn-box">
                <a href="" class="">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- find section -->
  <section class="find_section ">
    <div class="container">
      <form action="">
        <div class=" form-row">
          <div class="col-md-5">
            
          </div>
          
          <div class="col-md-2">
            <button type="submit" style=background:#2D383A;color:white;>
             <a href="2buttons.php" style= "font-size:20px;font-weight:bold;onmouseover="this.style.color='white' onmouseout="this.style.color='#FFB97B'"> Predict Price</a>
            </button>
          </div>
        </div>

      </form>
    </div>
  </section>

  <!-- end find section -->


  <!-- about section -->

  <section class="about_section layout_padding-bottom">
    <div class="square-box">
      <img src="images/square.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Our Apartment
              </h2>
            </div>
            <p>
                The real estate market is constantly changing, and a good real estate company must be able to adapt to these changes and provide relevant and valuable services to their clients. With the right mix of expertise, experience, and customer service, a real estate company can be an invaluable resource for individuals and businesses looking to buy, sell, rent, or manage properties.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- sale section -->

  <section class="sale_section layout_padding-bottom">
    <div class="container-fluids"style="background:#4F69C6">
      <div class="heading_container">
        <h2>
          Flats For Sale
        </h2>
        <p>
          These are some of the available Flats listed below.
        </p>
      </div>
      <div class="property-list">
        <ul class="row"style="background:#4F69C6">
            <li class="col-md-6">
            <?php
                    foreach ($flat_data as $key => $value) {
                    ?>
                <div class="property-box" style="background:	whitesmoke">
                    <div class="property-box__left">
                        <img src="admin/<?php echo $value['flat_image'] ?>" onclick="openModal(this)" alt="" />
                    </div>
                    <div class="property-box__right">
                        <div class="property-box__title h3">
                        <!-- <a style="color:black;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'" href="showblogs.php?id=<?php echo $record['id']?>"><?php echo $title?></a> -->
                            <a href="disf.php?flat_id=<?php echo $value['flat_id']?>"><?php echo $value['name']?>,<?php echo $value['location']?></a>
                        </div>
                        <div class="property-box__amenities"style="color:black">
                            <span><?php echo $value['rooms']?> Bedroom</span>
                        </div>
                        <div class="property-box__post-price"style="color:black"> Posted by
                            <div class="property-box__post-by"style="color:red">
                                 <?php echo $value['builders_name']?>
                            </div>
                            <div class="property-box__price">
                              <?php 
                              $price = $value['price']; // 15 lakhs
                              $convertedPrice = formatPrice($price);
                              ?>
                                <span class="badge">Rs.<?php echo $convertedPrice ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php
                    }
                    ?>
        </ul>
    </div>
    <div class="btn-box">
                <a href="flat1.php" class="">
                 <p style="margin-left:90%;width: 100px;border: 1px solid black;padding: 8px;border-radius:5px;background-color:cornsilk">View More</P>
                </a>
              </div>
</div>
</section>

<section class="sale_section layout_padding-bottom">
  <div class="container-fluids"style="background:#4F69C6">
    <div class="heading_container">
      <h2>
        Villas For Sale
      </h2>
      <p>
        These are some of the available Villas listed below.
      </p>
    </div>
    <div class="property-list">
      <ul class="row"style="background:#4F69C6">
          <li class="col-md-6">
             <?php
                    foreach ($villa_data as $key => $value) {
                    ?>
              <div class="property-box" style="background:whitesmoke">
                  <div class="property-box__left">
                      <img src="admin/<?php echo $value['villa_image'] ?>" onclick="openModal(this)" alt="" />
                  </div>
                  <div class="property-box__right">
                      <div class="property-box__title h3">
                          <a href="disv.php?villa_id=<?php echo $value['villa_id']?>""><?php echo $value['name']?>,<?php echo $value['location']?></a>
                      </div>
                      <div class="property-box__amenities"style="color:black">
                          <span>Current Status:<?php echo $value['furnished_status']?></span>
                      </div>
                      <div class="property-box__post-price"style="color:black">  Posted by
                          <div class="property-box__post-by">
                             <a href="#"style="color:red"><?php echo $value['agent']?></a>
                          </div>
                          <div class="property-box__price">
                              <?php 
                              $price = $value['price']; // 15 lakhs
                              $convertedPrice = formatPrice($price);
                              ?>
                                <span class="badge">Rs.<?php echo $convertedPrice ?></span>
                            </div>
                      </div>
                  </div>
              </div>
          </li>
          <?php
                    }
                    ?>
      </ul>
  </div>
  <div class="btn-box">
                <a href="villa1.php" class="">
                 <p style="margin-left:90%;width: 100px;border: 1px solid black;padding: 8px;border-radius:5px;background-color:cornsilk">View More</P>
                </a>
              </div>
</div>
</section>

<section class="sale_section layout_padding-bottom">
  <div class="container-fluids"style="background:	#4F69C6">
    <div class="heading_container">
      <h2>
        Lands For Sale
      </h2>
      <p>
        These are some of the available Villas listed below.
      </p>
    </div>
    <div class="property-list">
      <ul class="row"style="background:	#4F69C6">
          <li class="col-md-6">
             <?php
                    foreach ($land_data as $key => $value) {
                    ?>
              <div class="property-box"  style="background:whitesmoke">
                  <div class="property-box__left">
                      <img src="admin/<?php echo $value['land_image'] ?>" onclick="openModal(this)" alt="" />
                  </div>
                  <div class="property-box__right">
                      <div class="property-box__title h3">
                          <a href="disl.php?land_id=<?php echo $value['land_id']?>"><?php echo $value['name']?>,<?php echo $value['location']?></a>
                      </div>
                      <div class="property-box__amenities">
                          <span>Area:<?php echo $value['area']."sqfts"?></span>
                      </div>
                      <div class="property-box__post-price">
                          <div class="property-box__post-by">
                              Type: <?php echo $value['type']?>
                          </div>
                          <div class="property-box__price">
                              <?php 
                              $price = $value['price']; // 15 lakhs
                              $convertedPrice = formatPrice($price);
                              ?>
                                <span class="badge">Rs.<?php echo $convertedPrice ?></span>
                            </div>
                      </div>
                  </div>
              </div>
          </li>
          <?php
                    }
                    ?>
      </ul>
  </div>
  <div class="btn-box">
                <a href="land1.php" class="">
                 <p style="margin-left:90%;width: 100px;border: 1px solid black;padding: 8px;border-radius:5px;background-color:cornsilk">View More</P>
                </a>
              </div>
</div>
</section>


<section class="sale_section layout_padding-bottom">
  <div class="container-fluids"style="background:#4F69C6">
    <div class="heading_container">
      <h2>
        Rents For Sale
      </h2>
      <p>
        These are some of the available Rents listed below.
      </p>
    </div>
    <div class="property-list">
      <ul class="row"style="background:#4F69C6">
          <li class="col-md-6">
          <?php
                    foreach ($rent_data as $key => $value) {
                    ?>
              <div class="property-box" style="background:whitesmoke">
                  <div class="property-box__left">
                      <img src="admin/<?php echo $value['rent_image'] ?>" onclick="openModal(this)" alt="" />
                  </div>
                  <div class="property-box__right">
                      <div class="property-box__title h3">
                          <a href="disr.php?rent_id=<?php echo $value['rent_id']?>"><?php echo $value['name']?>,<?php echo $value['location']?></a>
                      </div>
                      <div class="property-box__amenities">
                          <span><?php echo $value['rooms']?> Bedroom</span>
                      </div>
                      <div class="property-box__post-price">
                          <div class="property-box__post-by">
                              Posted by <a href="#"><?php echo $value['owner_name']?></a>
                          </div>
                          <div class="property-box__price">
                              <?php 
                              $price = $value['rent_price']; // 15 lakhs
                              $convertedPrice = formatPrice($price);
                              ?>
                                <span class="badge">Rs.<?php echo $convertedPrice ?></span>
                            </div>
                      </div>
                  </div>
              </div>
          </li>
          <?php
                    }
                    ?>
      </ul>
  </div>
  <div class="btn-box">
                <a href="rent1.php" class="">
                 <p style="margin-left:90%;width: 100px;border: 1px solid black;padding: 8px;border-radius:5px;background-color:cornsilk">View More</P>
                </a>
              </div>
</div>

</section>
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
      <img id="modalImage" src="" alt="Modal Image">
    </div>
  </div>
  <!-- end sale section -->

  <!-- price section -->

 
  <!-- end price section -->

  <!-- deal section -->

  <section class="deal_section layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Very Good Deal For House
              </h2>
            </div>
            <p>
                Real estate companies provide a range of services to clients, including helping individuals and businesses to buy, sell, and rent properties, as well as managing properties for owners. These companies often employ real estate agents and brokers who have the expertise and experience to help clients navigate the complex and dynamic real estate market.
            </p>
            <a href="">
              Get A Quote
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <div class="box b1">
              <img src="images/d-1.jpg" alt="">
            </div>
            <div class="box b1">
              <img src="images/d-2.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end deal section -->


  <!-- us section -->
  <section class="us_section layout_padding2"style="background:#4F69C6">

    <div class="container">
      <div class="heading_container">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-1.png" alt="">
            </div>
            <div class="detail-box">
              <h3 class="price">
                100+
              </h3>
              <h5>
                 Houses
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-2.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                200+
              </h3>
              <h5>
                Projects Delivered
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-3.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                1000+
              </h3>
              <h5>
                Satisfied Customers
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-4.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                150+
              </h3>
              <h5>
                Cheap Rates
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Get A Quote
        </a>
      </div>
    </div>
  </section>

  <!-- end us section -->

  <!-- client secction -->

  <section class="client_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          What Our Customer Says
        </h2>
      </div>
      <div class="client_container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="box">
                <div class="img-box">
                  <img src="images/client2.jpeg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    <span>Abhijeet and sons</span>
                    <hr>
                  </h5>
                  <p>
                    I would highly recommend this real estate company to anyone looking to buy or sell a property. 
                    The real estate company made the buying process stress-free and enjoyable.
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    <span>Dlf Group</span>
                    <hr>
                  </h5>
                  <p>
                    The customer service team was always available to answer any questions I had
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    <span>Wadia Brothers</span>
                    <hr>
                  </h5>
                  <p>
                    The company's marketing strategy was effective in selling my property quickly and for a fair price
                  </p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section "style="background:#4F69C6">
    <div class="container">
      <div class="heading_container">
        <h2>
          Get In Touch
        </h2>
      </div>
    </div>
    <div class="container-fluid"style="background:#4F69C6">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30761.151117413847!2d73.79537296012!3d15.47669056194602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfc0a93361ccd9%3A0xdd98120b24e5be61!2sPanaji%2C%20Goa!5e0!3m2!1sen!2sin!4v1675064492494!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-5 ">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" placeholder="Name" style="border-radius:4px;font-weight:bold;border: solid black 2px">
              </div>
              <div>
                <input type="email" placeholder="Email" style="border-radius:4px;font-weight:bold;border: solid black 2px"/>
              </div>
              <div>
                <input type="text" placeholder="Phone Number" style="border-radius:4px;font-weight:bold;border: solid black 2px"/>
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" style="border-radius:4px;font-weight:bold;border: solid black 2px"/>
              </div>
              <div class="d-flex ">
                <button>
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- end contact section -->



  <!-- info section -->
  <section class="info_section"style="background:#4F69C6">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact" style="font-size:20px">
            <h5>
              About Apartment
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/phone.png" width="12px" alt="">
              </div>
              <p>
                +91 9921902654
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/mail.png" width="18px" alt="">
              </div>
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
                Transforming lives through real estate.
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="">
                  Follow us on all social media to stay updated.
                </a>
              </li>
              
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section "style="background:#4F69C6">
    <div class="container">
      <p>
       Made with ❤️ by Nirzar, Prabhakar,Ashish, Avishka, Chintan
      </p>
    </div>
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
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>


</body>

</html>