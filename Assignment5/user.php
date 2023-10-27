<?php
session_start();

// check role is set(isset) by session  or role value is admin
if(!isset($_SESSION["role"]) || $_SESSION["role"] !='user'){ 
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>user Page</title>
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h1>Welcome, <?php echo $_SESSION['firstname']; ?></h1>
            </div>
            <div class="col-md-6 text-right">
                <form method="post" action="logout.php">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
</body>
</html>
