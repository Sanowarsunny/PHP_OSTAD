<?php
function printFibonacci($count) {
    $num1 = 0;
    $num2 = 1;

    for ($i = 1; $i <= $count; $i++) {
        // Print the current Fibonacci number
        echo $num1 . " ";

        // Calculate the next Fibonacci number
        $next = $num1 + $num2;

        // Update the values for the next iteration
        $num1 = $num2;
        $num2 = $next;
    }
}

// Call the function to print the first 15 Fibonacci numbers
printFibonacci(15);

?>