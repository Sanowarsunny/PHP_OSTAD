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
        'Math' => 56,
        'English' => 60,
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
    }
}

calculateAverages($studentGrades);

?>
