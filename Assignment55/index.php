<?php


session_start();

if(!isset($_SESSION["email"])){
    header("Location: login.php");
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    welcome <?php echo $_SESSION["first_Name"];?>

    <br><button class="btn btn-outline-light btn-lg px-5" type="submit"><a href="./logout.php" >Logout</button>
</body>
</html>