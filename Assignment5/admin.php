<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Load the JSON data
$users = json_decode(file_get_contents('users.json'), true);

if (isset($_POST['edit'])) {

    $editEmail = $_POST['edit'];
    $encode = base64_encode($editEmail);
    header("Location: edit.php?email=$encode");
    exit();
}

if (isset($_POST['delete'])) {
    // Handle delete request
    $deleteEmail = $_POST['delete'];
    if (isset($users[$deleteEmail])) {
        unset($users[$deleteEmail]);
        file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
    }
}

if (isset($_POST['add_user'])) {
    // Handle adding a new user
    $newUserEmail = $_POST['email'];
    $newUserFirstName = $_POST['firstname'];
    $newUserLastName = $_POST['lastname'];
    $newUserPassword = md5($_POST['password']);
    $newUserRole = $_POST['role'];

    if (!empty($newUserEmail) && !empty($newUserFirstName) && !empty($newUserLastName) && !empty($newUserPassword) && !empty($newUserRole)) {
        $users[$newUserEmail] = [
            'firstname' => $newUserFirstName,
            'lastname' => $newUserLastName,
            'password' => $newUserPassword,
            'role' => $newUserRole,
        ];
        file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
    }
}

if (isset($_POST['logout'])) {
    header("Location: logout.php");
    exit();
}

// Set a cookie with the user's name
$adminName = base64_encode($_SESSION['firstname']) . ' ' . base64_encode($_SESSION['lastname']);
setcookie('admin_name', $adminName, time() + 30, '/');



?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
        <h2>Admin Dashboard</h2>
        
        <!-- Form to add a new user -->
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                </div>
                <div class="form-group col-md-2">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="role" placeholder="Role">
                </div>
            </div>
            <button type="submit" name="add_user" class="btn btn-success">Add User</button>
        </form>
        
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $email => $user) : ?>
                    <tr>
                        <td><?php echo $user['role']; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['lastname']; ?></td>
                        <td>
                            <form method="POST">
                                <button type="submit" name="edit" value="<?php echo $email; ?>" class="btn btn-primary">Edit</button>
                                <button type="submit" name="delete" value="<?php echo $email; ?>" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts for Bootstrap to work -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
