<?php
include 'db.php';

$sql = "SELECT * from flats";

if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
 }
 $sql1 = "SELECT * from villa";

if ($result1 = mysqli_query($con, $sql1)) {

    // Return the number of rows in result set
    $rowcount1 = mysqli_num_rows( $result1 );
    
 }
 $sql2 = "SELECT * from rents";

if ($result2 = mysqli_query($con, $sql2)) {

    // Return the number of rows in result set
    $rowcount2 = mysqli_num_rows( $result2 );
    
 } 
 $sql3 = "SELECT * from land";

 if ($result3 = mysqli_query($con, $sql3)) {
 
     // Return the number of rows in result set
     $rowcount3 = mysqli_num_rows( $result3 );
     
  } 
?>
<!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <main class="table">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="flat_table.php">Flats</a>
      <a class="nav-item nav-link" href="villa_table.php">Villas</a>
      <a class="nav-item nav-link" href="rent_table.php">Rents</a>
      <a class="nav-item nav-link" href="userflatdata.php">User Flats</a>
      <a class="nav-item nav-link" href="uservilladata.php">User Villas</a>
      <a class="nav-item nav-link" href="userrentdata.php">User Rents</a>
    </div>
  </div>
</nav>
        
        <section class="table__body">
        <div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">FLATS</h5>
        <p class="card-text">
        <?php
echo $rowcount;
?>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">VILLAS</h5>
        <p class="card-text">
<?php
echo $rowcount1;
?>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">RENTS</h5>
        <p class="card-text">
        <?php
echo $rowcount2;
?>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">LANDS</h5>
        <p class="card-text">
        <?php
echo $rowcount3;
?>
        </p>
      </div>
    </div>
  </div>
</div>

        </section>
    </main>
</body>

</html>