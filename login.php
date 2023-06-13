<?php
// session_start();
include "db.php";

  if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);  
    $password = mysqli_real_escape_string($con, $_POST["password"]);  
    // $password = md5($password);  

    $query = "SELECT * FROM adminuser WHERE email = '$email' ";  
    $result = mysqli_query($con
    , $query);  
          if(mysqli_num_rows($result)>0)
          {
            $row = mysqli_fetch_assoc($result);
              if ($row['email'] = $email && $row['password'] === $password) {
                // $_SESSION['user']=$email;
                  header('location:flat_table.php');
          }
          else {
              echo "<script>alert('Wrong Email or Password'); </script>";
          }
      }
      else{
          echo "<script>alert('User Not Registered');</script>";
      }
  }
  
?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style1.css">
    <title>Login</title>
  </head>
  <body>
 
    <section class="Form my-5 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg 5">
                    <img width=100% height=100% src="House.jpeg" alt="House" class="img-fluid">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-4">ADMIN</h1>
                    <h5>Log in into your account</h5>
                    <form method="post" autocomplete="off">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" name="email" class="form-control mx-2 my-2 p-4" placeholder="Email Address" required><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" name="password" class="form-control mx-2 my-2 p-4" placeholder="Password" required><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="submit" value="Login" name="login" class="btn-1"/><br><br><br>
                            </div>
                        </div>
                        <p style="margin-left:100px;">Don't have an account?:<a href="register.php">  Register Here</a></p>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

