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
    <title>User</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h1>Welcome, <?php echo $_SESSION['role']; ?></h1>
            </div>
            <div class="col-md-6 text-right">
                <form method="post" action="logout.php">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
            </div>
            <h2>Name: <?php echo $_SESSION['firstname']; 
                echo $_SESSION['lastname']; ?></h2>
</body>
</html>
