<?php
include "db.php";

if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $duplicate=mysqli_query($con,"SELECT * FROM adminuser WHERE email='$email'");
    if(mysqli_num_rows($duplicate)>0)
    {
        echo "<script>alert(' Email already exists');</script>";

    }
    
    else{
        
        $sql =" INSERT INTO `adminuser`(`email`,`password`) VALUES ('$email','$password')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Registration Successfull');</script>";
            header('location:login.php');
            exit;
        } else {
            echo "<script>alert('Data not submitted')</script>";
            header('location:register.php');
        }

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
    <title>SignUp</title>
  </head>
  <body>
 
    <section class="Form my-5 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg 5">
                    <img width=100% height="auto" style="margin-top:100px" src="House.jpeg" alt="House" class="img-fluid">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-4">ADMIN</h1>
                    <h5>Sign up for your account</h5>
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
                        

                      
                            <div class="col-lg-7">
                                <input type="submit" value="Register" name="register" class="btn-1"/><br><br><br>
                            </div>
                        </div>
                        <p style="margin-left:100px;">Already have an account?:<a href="login.php">  Login Here</a></p>
                    </form>

                </div>
            </div>
        </div>
    </section>

  </body>
</html>
