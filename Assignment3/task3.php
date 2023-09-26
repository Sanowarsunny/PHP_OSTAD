<?php

//Task 3: Array Sorting  

function descending_sort($grades){
    rsort($grades);
    print_r($grades);
}

$grades= [85, 92, 78, 88, 95];

descending_sort($grades);