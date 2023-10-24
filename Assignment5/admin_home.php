<?php
session_start();

// check role is set(isset) by session  or role value is admin
if(!isset($_SESSION["role"]) || $_SESSION["role"] !='admin'){ 
    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    welcome <h1><?php echo $_SESSION["first_Name"];?></h1><br>
    <h6><?php echo $_SESSION["last_Name"];?></h6>


    <br><button class="btn btn-outline-light btn-lg px-5" type="submit"><a href="./logout.php" >Logout</button>
</body>
</html>