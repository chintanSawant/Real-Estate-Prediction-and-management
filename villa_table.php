<?php
include 'db.php';
$img="";
?>
<!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Villa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <main class="table">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
      <a class="nav-item nav-link" href="flat_table.php">Flats</a>
      <a class="nav-item nav-link active" href="villa_table.php">Villas<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="land_table.php">Lands</a>
      <a class="nav-item nav-link" href="rent_table.php">Rents</a>
      <a class="nav-item nav-link" href="userflatdata.php">User Flats</a>
      <a class="nav-item nav-link" href="uservilladata.php">User Villas</a>
      <a class="nav-item nav-link" href="userrentdata.php">User Rents</a>
    </div>
  </div>
</nav>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                    <th><i>NAME</i></th>
                    <th><i>AGENT</i></th>
                    <th><i>ADDRESS</i></th>
                    <th><i>LOCATION</i></th>
                    <th><i>PRICE</i></th>
                    <th><i>AMMENITIES</i></th>
                    <th><i>FURNISHED STATUS</i></th>
                    <th><i>CONTACT AGENT</i></th>
                    <th><i>Image</i></th>
                    <th><i>More Image</i></th>
                    <th colspan="2"><i><button class="btn btn-primary  float-right"><a href="newvilla.php" class="text-white">(+)Add new Villa </i></a></button></i></th>
                    </tr>
                </thead>
                <?php
        $limit = 5;
        $page = 1;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        }
        $offset = ($page - 1) * $limit;

        $q = "SELECT * FROM `villa` ORDER BY `villa_id`  LIMIT  {$offset},{$limit}";


        $query = mysqli_query($con, $q);
        
        while ($res = mysqli_fetch_assoc($query)) {
            $img=$res['more_image'];
            $img=explode(" ",$img);
            $count=count($img)-1;

        ?>
                <tbody>
                    <tr>
                    <td><?php echo $res['name'] ?></td>
              <td ><?php echo $res['agent'] ?></td>
              <td><?php echo $res['address'] ?></td>
              <td><?php echo $res['location'] ?></td>
              <td ><?php echo $res['price'] ?></td>
              <td ><?php echo $res['ammenities'] ?></td>
              <td ><?php echo $res['furnished_status'] ?></td>
              <td ><?php echo $res['contact_agent'] ?></td>
              <td><img src="<?php echo $res['villa_image'] ?>" whidth=50px; height=50px; alt="image" onclick="openModal(this)"></td>
              <td>
               <?php
               for($i=0;$i<$count;++$i)
            {
              ?>  
                <img src="villa_images/<?= $img[$i]?>" height="100px" width="100px" onclick="openModal(this)"/>
               <?php
            }
            ?>
              </td>
              <td><button class="btn btn-danger" name="delete"><a style="color:black" href="deletevilla.php?id=<?php echo $res['villa_id']; ?>"><i class="fa fa-trash-o"></a></i></button></td>
              <td><button class="btn btn-info btn" name="update" name="update"><a style="color:black" href="updatevilla.php?id=<?php echo $res['villa_id']; ?>" ><i class="fa fa-edit"></a></i></i></a></button></td>
                    </tr>                    
                </tbody>
                <?php

}
?>
            </table>
                    <!-- The Modal -->
  <div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
      <img id="modalImage" src="" alt="Modal Image">
    </div>
  </div>
            <p style="text-align:center">
        <?php
        $s1 = "SELECT * FROM villa";
        $que = mysqli_query($con, $s1);

        $totalrecords = mysqli_num_rows($que);


        $totalpage = ceil($totalrecords / $limit);



        for ($i = 1; $i <= $totalpage; $i++) {

          echo '  <a href="villa_table.php?page='.$i.'" class="btn btn-success ">'.$i.'</a>';
        }
        ?>
      </p>  
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
    </main>
</body>

</html>