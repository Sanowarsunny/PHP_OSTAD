<?php


session_start();

// //echo $_SESSION["role"];

if(!isset($_SESSION["email"])){
    header("Location: login.php");
}
elseif ($_SESSION["role"]=='user' ) {
    header("Location: user_home.php");
}
elseif($_SESSION["role"]=='admin' ){
    header("Location: admin_home.php");

}
?>

