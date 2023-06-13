<!DOCTYPE html>
<html>
<head>
    <link href="2buttons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="website/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


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
			<ul class="m-0">
				<li><a href="index.php" class="white active">Home</a></li>
				<li><a href="loan.php" class="white">Home Loan</a></li>
				<li><a href="options.php" class="white">Sell Property</a></li>
				<li><a href="logout.php" class="white">Log out</a></li>
			</ul>
		</nav>
<style>
    .button {
      border-radius: 4px;
      background:whitesmoke;
      border:black solid 2px;
      color: #000000;
      text-align: center;
      font-size: 28px;
      padding: 20px;
      width: 200px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 255px 265px;
    }
    
    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }
    
    .button span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }
    
    .button:hover span {
      padding-right: 25px;
    }
    
    .button:hover span:after {
      opacity: 1;
      right: 0;
    }
    </style>
    
    
    <button class="button" ><a href="ML/client/index.html"><span>BANGALORE </span></a></button>
    <button class="button"><a href="ML/client/index.html"><span>PUNE </span></a></button>
    <section class="container-fluid footer_section ">
        <div class="container">
          <p>
           Made with ❤️ by Nirzar, Prabhakar,Ashish, Avishka, Chintan
          </p>
        </div>
      </section>
</body>
</html>


