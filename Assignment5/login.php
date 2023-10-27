<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Load the JSON data
    $users = json_decode(file_get_contents('users.json'), true);

    if (isset($users[$email]) && $users[$email]['password'] === $password) {
        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $users[$email]['firstname'];
        $_SESSION['lastname'] = $users[$email]['lastname'];
        $_SESSION['role'] = $users[$email]['role'];
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add custom CSS for styling -->
    <style>
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="login.php" method="POST">
                        <span class="error" style="color: #FF0001;">
                            <?php if (isset($error_message)) {
                                echo $error_message;
                            } ?>
                        </span>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    <p class="text-center mt-3">Don't have an account? <a href="sign.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts for Bootstrap to work -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>