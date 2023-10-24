<?php
session_start(); 

session_unset();//clear session

header("Location: login.php"); //redirect to this page
?>