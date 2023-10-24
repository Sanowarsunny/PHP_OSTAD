<?php

session_start();

$email = $_POST["email"] ?? "";// catch form value using post method
$password = $_POST["password"] ?? "";


//$err_Message = "Role is not Match";

$fp = fopen("./database.txt","r");// file open

$roles = array(); // take file value inside the array
$emails = array();
$passwords = array();
$first_Names = array();
$last_Names = array();

//use while loop for on file value read and push this value inside those array variable
while($line = fgets($fp)){
    $val = explode(",", $line);// use explode for comma separator

    array_push($roles, trim($val[0]));
    array_push($emails, trim($val[1]));
    array_push($passwords, trim($val[2]));
    array_push($first_Names, trim($val[3]));
    array_push($last_Names, trim($val[4]));

}

// echo $emails[1];

fclose($fp);

//iterate untill how many roles and match(email and pass),
//then store array value in session variable
for($i=0; $i<count($roles); $i++){

        if ($email == $emails[$i] && $password == $passwords[$i]) {

            $_SESSION["role"] = $roles[$i];
            $_SESSION["email"] = $emails[$i];
            $_SESSION["first_Name"] = $first_Names[$i];
            $_SESSION["last_Name"] = $last_Names[$i];


            header("Location: index.php");//redirect to this page
        }
      }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login Page</title>
</head>
<body>
<form action="login.php" method="POST">
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX" >Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button><br><br><br>


              <button class="btn btn-outline-light btn-lg px-5" type="submit"><a href="sign.php" style="text-decoration:none;">Sign Up</a></button><br>

               <br>
               </form>

              <!-- <a href="sign.php" >Sign Up</a> -->
              

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
 </section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
