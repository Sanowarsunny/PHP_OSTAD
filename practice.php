<?php 

$string = "Hidden message";
$key = "ilovemycountry9823u234sjkadni";

$new = "uandoor9k328nt3ciiymv2j4ueysl";
echo $new."\n";
$encryp = " ";

for ($i = 0; $i < strlen($string); $i++) {
    $currentLetter = $string[$i];
    $currentPosition = strpos($key, $currentLetter);
    $replacement = $new[intval($currentPosition)];
    // echo $replacement;
    $encryp .= $replacement;
}
echo $encryp."\n";

$text = $encryp;
echo $text."\n";

$decryp = "";

for ($i = 0; $i < strlen($text); $i++) {  

    $currentLetter = $text[$i];
    $currentPosition = strpos($new, $currentLetter);
    $replacement = $key[intval($currentPosition)];
    $decryp .= $replacement;
}
echo "Decrp: ".$decryp;

?>
