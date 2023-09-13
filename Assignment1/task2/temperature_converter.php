<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Temperature Converter</title>
</head>
<body>
    <div class="container">
        <h1>Temperature Converter</h1>
        <form method="post">

            <label for="conversion">Select Conversion:</label>
            <select id="conversion" name="conversion" required>
                <option value="celsiusToFahrenheit">Celsius to Fahrenheit</option>
                <option value="fahrenheitToCelsius">Fahrenheit to Celsius</option>
            </select>

            <label for="temperature">Enter Temperature:</label>
            <input type="number" id="temperature" name="temperature" required>

            

            <input type="submit" value="Convert">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $temperature = floatval($_POST["temperature"]);
            $conversion = $_POST["conversion"];
            $result = 0;

            if ($conversion === "celsiusToFahrenheit") {
                $result = ($temperature * 9/5) + 32;
                $result = sprintf("%.2f", $result);
                echo "<div class='result'>Result of $temperature Celsius: $result Fahernheit</div>";

            } elseif ($conversion === "fahrenheitToCelsius") {
                $result = ($temperature - 32) * 5/9;
                $result = sprintf("%.2f", $result);
                echo "<div class='result'>Result of $temperature Fahrenheit: $result Celsius</div>";
            }

            //echo "<div class='result'>Result of $temperature: $result</div>";
        }
        ?>
    </div>
</body>
</html>
