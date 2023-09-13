<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even/Odd Checker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Even/Odd Checker</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="POST" class="mb-3">
                    <div class="form-group">
                        <label for="number">Enter a Number:</label>
                        <input type="number" class="form-control" id="number" name="number" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Check</button>
                </form>
                
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $number = $_POST["number"];
                    $result = ($number % 2 == 0) ? "even" : "odd";
                    echo "<div class='alert alert-info'>The number $number is $result.</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
