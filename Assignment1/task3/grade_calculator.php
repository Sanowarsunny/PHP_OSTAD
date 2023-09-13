<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Grade Calculator</h1>
        <form action="" method="POST">
            <label for="score1">Test Score 1:</label>
            <input type="number" name="score1" placeholder="Enter Number" required><br>

            <label for="score2">Test Score 2:</label>
            <input type="number" name="score2" placeholder="Enter Number" required><br>

            <label for="score3">Test Score 3:</label>
            <input type="number" name="score3" placeholder="Enter Number" required><br>

            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $score1 = $_POST["score1"];
            $score2 = $_POST["score2"];
            $score3 = $_POST["score3"];

            // Calculate the average
            $average = ($score1 + $score2 + $score3) / 3;
            $average=sprintf("%.2f", $average);
            // Determine the corresponding grade
            $grade = '';
            if ($average >= 80) {
                $grade = 'A';
            } elseif ($average >= 70) {
                $grade = 'B';
            } elseif ($average >= 60) {
                $grade = 'C';
            } elseif ($average >= 40) {
                $grade = 'D';
            } else {
                $grade = 'F';
            }

            echo "<p>Average Score: $average</p>";
            echo "<p>Letter Grade: $grade</p>";
        }
        ?>
    </div>
</body>
</html>
