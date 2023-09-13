<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Weather Report</h1>
        <form method="POST">
            <div class="form-group">
                <label for="temperature">Enter Temperature (in Celsius):</label>
                <input type="number" class="form-control" id="temperature" name="temperature" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Weather</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temperature = $_POST["temperature"];

            $message = '';
            if ($temperature < 0) {
                $message = "It's freezing!";
            } elseif ($temperature >= 0 && $temperature <= 20) {
                $message = "It's cool.";
            } else {
                $message = "It's warm.";
            }
            ?>

            <div class="alert alert-info mt-3">
                <p><?php echo $message; ?></p>
            </div>
        <?php } ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
