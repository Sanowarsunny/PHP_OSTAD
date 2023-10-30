<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['email'])) {
    $editEmail = base64_decode($_GET['email']);

    // Load the JSON data
    $users = json_decode(file_get_contents('users.json'), true);

    if (isset($users[$editEmail])) {
        $user = $users[$editEmail];
    } else {
        header("Location: admin.php");
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
}

if (isset($_POST['update'])) {
    // Handle edit form submission
    $editFirstName = $_POST['firstname'];
    $editLastName = $_POST['lastname'];
    $editRole = $_POST['role'];

    $users[$editEmail]['firstname'] = $editFirstName;
    $users[$editEmail]['lastname'] = $editLastName;
    $users[$editEmail]['role'] = $editRole;

    // Update the JSON data
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form method="post">
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $user['role']; ?>">
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts for Bootstrap to work -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
