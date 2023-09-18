<?php
/*
Task 2: Skip Multiples of 5
Create a PHP script that prints numbers from 1 to 50 using a for loop. However, when the
loop encounters a multiple of 5, it should skip that number using the continue statement and
continue to the next iteration.
*/
function skip_mul_5($start, $stop){

    for ($i = $start; $i <= $stop; $i++) {
    
        if ($i % 5 == 0) {
            // Skip multiples of 5
            continue; // Skip the current iteration and move to the next one
        }
        echo $i."\t";
    }
}

skip_mul_5(1,50);

// for ($i = 1; $i <= 50; $i++) {
//     if ($i % 5 == 0) {
//         continue; 
//     }
//     echo $i . " ";
// }

?>