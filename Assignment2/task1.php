<?php

/*
Task 1: Looping with Increment using a Function
Write a PHP function that uses a for loop to print all even numbers from 1 to 20, but with a
step of 2. In other words, you should print 2, 4, 6, 8, 10, 12, 14, 16, 18, 20. The function
should take the arguments like start as 1, end as 20 and step as 2. You must call the
function to print.
Also do the same using while loop and do-while loop also.
*/

function even_Loop($start, $end, $step=2){

    if($start%2 !=0){
        
        for($i=$start+1; $i<= $end; $i=$i+$step){
            echo $i." ";
        }
    }
    else if($start%2 ==0){
        for($i=$start; $i<= $end; $i=$i+$step){
            echo $i." ";
        }
    }
    echo "\n";
}

even_Loop(2,20,2);


function even_While($start, $end, $step=2){

    if($start%2 !=0){
        
        $i = $start+1;

        while( $i<= $end){
            echo $i." ";
            $i=$i+$step;
        }
    }
    else if($start%2 ==0){
        
        $i = $start;

        while( $i<= $end){
            echo $i." ";
            $i=$i+$step;
        }
    }
    echo "\n";
}

even_While(2,20,2);


function even_DoWhile($start, $end, $step=2){

    if($start%2 !=0){
        
        $i = $start+1;
        do{
            echo $i." ";
            $i=$i+$step;
        }
        while( $i<= $end);
    }
    else if($start%2 ==0){
        
        $i = $start;

        do{
            echo $i." ";
            $i=$i+$step;
        }
        while( $i<= $end);
    }
    echo "\n";
}

even_DoWhile(1,20);