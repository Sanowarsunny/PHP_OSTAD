<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Simple Calculator</title>
</head>
<body>
    <div class="container">
        <h1>Simple Calculator</h1>
        <form action="" method="POST">
            <label for="num1">Number 1:</label>
            <input type="number" name="num1" required><br>

            <label for="num2">Number 2:</label>
            <input type="number" name="num2" required><br>

            <label for="operation">Select Operation:</label>
            <select name="operation">
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
            </select><br>

            <input type="submit" name="calculate" value="Calculate">
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    $emoji = '🔥';
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    $emoji = '😊';
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    $emoji = '✨';
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                        $emoji = '🌟';
                    } else {
                        $result = 'Cannot divide by zero';
                        $emoji = '❌';
                    }
                    break;
                default:
                    $result = 'Invalid operation';
                    $emoji = '❌';
                    break;
            }

            echo "<p>Result: $result $emoji</p>";
        }
        ?>
    </div>
</body>
</html>
