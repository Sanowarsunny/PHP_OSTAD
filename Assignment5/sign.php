<?php
// define variables to empty values  
$firstNameErr = $emailErr = $passErr = "";
$firstName = $email = $password = $lastName = "";

//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $lastName = input_data($_POST["lastName"]);

    //String Validation  
    if (empty($_POST["firstName"])) {
        $nameErr = "Name is required";
    } else {
        $firstName = input_data($_POST["firstName"]);
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $nameErr = "Only alphabets and white space are allowed";
        }
    }

    //Email Validation   
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST["email"]);
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    //password check

    if ($_POST["password"] != $_POST["confirmpass"]) {
        $passErr = "Password is not match.";
    } else {
        $password = input_data($_POST["password"]);
    }



}
function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up Form</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Sign Up</div>
                        <div class="card-body">
                            <span>
                                <?php
                                if (isset($_POST['submit'])) {
                                    if ($firstNameErr == "" && $emailErr == "" && $passErr == "") {
                                        $fp = fopen("./database.txt", "apend"); // file open
                                        fwrite($fp, "\n user,{$firstName},{$lastName},{$email},{$password}");
                                        fclose($fp);

                                        //header("Location: login.php");
                                        echo "Sign Up Successfully and press Back button!!!";
                                    }
                                }
                                ?>
                            </span>
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
                                <span class="error" style="color: #FF0001;">*
                                    <?php echo $firstNameErr; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                <span class="error" style="color: #FF0001;">*
                                    <?php echo $emailErr; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpass"
                                    placeholder="Confirm Password">
                                <span class="error" style="color: #FF0001;">*
                                    <?php echo $passErr; ?>
                                </span>

                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                            <button class="btn btn-primary float-right" type="submit"><a href="login.php"
                                    style="text-decoration:none; color:white">Back</a></button><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Add the Bootstrap JS and Popper.js scripts for Bootstrap to work -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>