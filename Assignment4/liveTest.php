<?php
class Person {
    // attributes
    public string $name;
    public int $age;

    // constructor
    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // method
    public function introduce(): void {
        echo "My name is {$this->name} and I am {$this->age} years old.\n";
    }
}

class Student extends Person {
    // additional attribute
    public int $mark;

    // constructor
    public function __construct(string $name, int $age, int $mark) {
        parent::__construct($name, $age);
        $this->mark = $mark;
    }

    // method override
    public function introduce(): void {
        parent::introduce();
    }

    // additional method
    public function calculate_grade_percentage(): string {
        $percentage = ($this->mark / 100) * 100;
        return "{$percentage}%";
    }
}

$person = new Person("John", 30);
$person->introduce();


$student = new Student("Robert", 18, 85);
$student->introduce();
$gradePercentage = $student->calculate_grade_percentage();
echo "My grade percentage is {$gradePercentage}\n";


?>