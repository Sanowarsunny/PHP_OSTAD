<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Comparison Tool</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Number Comparison Tool</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="number1">Enter the first number:</label>
                <input type="number" class="form-control" id="number1" name="number1" required>
            </div>
            <div class="form-group">
                <label for="number2">Enter the second number:</label>
                <input type="number" class="form-control" id="number2" name="number2" required>
            </div>
            <button type="submit" class="btn btn-primary">Compare</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number1 = $_POST["number1"];
            $number2 = $_POST["number2"];

            $result = ($number1 > $number2) ? $number1 : $number2;

            echo "<div class='mt-3 alert alert-success text-center'>The larger number is: $result</div>";
        }
        ?>
    </div>
</body>
</html>
