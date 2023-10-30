<?php 

$string = "Hidden message";
$key = "ilovemycountry9823u234sjkadni";
$new = str_shuffle($key);
//echo $new;
$encryp = " ";

for ($i = 0; $i < strlen($string); $i++) {
    $currentLetter = $string[$i];
    $currentPosition = strpos($key, $currentLetter);
    $replacement = $new[$currentPosition];
    $encryp .= $replacement;
}

print_r ($encryp);
