<?php

//Task 1: String Manipulation
function string_manipulation($text){
    $textLower = strtolower($text);
    echo $textLower."</br>";

    $replaceText = str_replace('brown','red',$textLower);
    echo $replaceText;
}

$text = "The quick brown fox jumps over the lazy dog.";

string_manipulation($text);