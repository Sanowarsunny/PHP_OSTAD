<?php
session_start(); 

session_unset();//clear session
if (isset($_POST['logout'])) {
    // Destroy the "admin_name" cookie
    setcookie('admin_name', '', time() - 3600, '/');
    header("Location: logout.php");
    exit();
}

header("Location: login.php"); //redirect to this page
exit();
?>