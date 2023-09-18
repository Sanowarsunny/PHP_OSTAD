<?php
/*
Task 3: Break on Condition
Write a PHP program that calculates and prints the first 10 Fibonacci numbers. But, if a
Fibonacci number is greater than 100, break out of the loop using the break statement.
*/
// 0 1 1 2 3 5 8

function fibonacci_Break($count) {
    $num1 = 0;
    $num2 = 1;
    
    for ($i = 1; $i <= $count; $i++) {
        $res = $num1;
        echo $res . " ";

        $next = $num1 + $num2;

        if ($next > 100) {
            break; // Break the loop if the next Fibonacci number is greater than 100
        }

        $num1 = $num2;
        $num2 = $next;
    }
}

// Call the function to print the first 10 Fibonacci numbers or break if > 100
fibonacci_Break(24);


?>