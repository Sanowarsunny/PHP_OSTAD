<?php

$usersFile = 'users.json';

$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];


$errMess = "";

function saveUser($users, $file)
{
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}

if (isset($_POST["submit"])) {

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if ($password != md5($_POST["confirmpassword"])) {
        $errMess = "Password is not match.";
    } elseif (empty($firstName) || empty($lastName) || empty($email)) {
        $errMess = "Please fill all information";
    } else {
        if (isset($users[$email])) {
            $errMess = "Email already exists";
        } else {
            $users[$email] = [
                "firstname" => $firstName,
                "lastname" => $lastName,
                "password" => $password,
                "role" => "user"
            ];
            saveUser($users, $usersFile); //add users and file
            header("Location:login.php");
        }
    }

}
?>







<!DOCTYPE html>
<html>

<head>
    <title>Sign Up Form</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Sign Up</div>
                    <div class="card-body">
                        <form action="sign.php" method="POST">
                            <span>
                                <?php
                                echo $errMess;
                                ?>
                            </span>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="first-name">First Name</label>
                                        <input type="text" class="form-control" name="firstname"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpassword"
                                    placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Sign Up</button>
                        </form>
                    </div>
                    <p style="padding-left:20%">Already have an account? <a href="login.php"
                            class="btn btn-link">Login</a></p>

                </div>
            </div>
        </div>