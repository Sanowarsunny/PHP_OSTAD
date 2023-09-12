<?php
$name = "MD SANOWAR HOSSAIN";
$age = 26;

$country = "Bangladesh";
$intro = "I am a web developer with a passion for creating dynamic and responsive web applications.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Personal Info</title>
</head>
<body>
    <header>
        <h1>My Personal Info</h1>
    </header>
    <main>
        <section class="personal-info">
            <h2>Personal Information</h2><br>
            <div class="info">
                <p><strong>Name:</strong> <?php echo strtoupper($name); ?></p>
                <p><strong>Age:</strong> <?php echo $age; ?></p>
                <p><strong>Country:</strong> <?php echo strtoupper($country); ?></p>
            </div>
        </section>
        <section class="intro">
            <h2>ABOUT ME</h2><br>
            <p><?php echo strtoupper($intro); ?></p>
        </section>
    </main>
</body>
</html>
