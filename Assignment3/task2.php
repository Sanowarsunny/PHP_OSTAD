<?php

function even_remove($array){
    $arr = [];
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] % 2 != 0) { // Check for odd numbers
            array_push($arr, $array[$i]); // Add the value to the result array
        }
    }
    return $arr;
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$result = even_remove($numbers);
print_r($result);

?>

