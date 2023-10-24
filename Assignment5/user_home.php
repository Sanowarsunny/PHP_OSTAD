<?php
session_start();

// check role is set by session or role value is user
if(!isset($_SESSION["role"]) || $_SESSION["role"] !='user'){ 
    header("Location: login.php");
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>
    welcome <?php echo $_SESSION["first_Name"];?>

    <br><button class="btn btn-outline-light btn-lg px-5" type="submit"><a href="./logout.php" >Logout</button>
</body>
</html>