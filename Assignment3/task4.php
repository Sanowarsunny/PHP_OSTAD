<?php

$studentGrades = [
    'Student1' => [
        'Math' => 67,
        'English' => 89,
        'Science' => 78,
    ],
    'Student2' => [
        'Math' => 75,
        'English' => 80,
        'Science' => 68,
    ],
    'Student3' => [
        'Math' => 6,
        'English' => 50,
        'Science' => 89,
    ]
];

function calculateAverages($grades) {
    foreach ($grades as $child => $marks) {

        print_r($marks);
        $total = array_sum($marks);
        $count = count($marks);
        $average = $total / $count;
        
        $roundNumber = sprintf("%.2f", $average);

        echo "$child Average Grade: $roundNumber <br>";

        if ($roundNumber>=80) {
            echo "$child got A+ ";
        }else if ($roundNumber>=70) {
            echo "$child got A ";
        }else if ($roundNumber>=60) {
            echo "$child got B ";
        }else if ($roundNumber>=50) {
            echo "$child got C ";
        }else if ($roundNumber>=40) {
            echo "$child got D ";
        }else if ($roundNumber<40) {
            echo "$child Fail!!! ";
        }
        
    }
}

calculateAverages($studentGrades);

?>
