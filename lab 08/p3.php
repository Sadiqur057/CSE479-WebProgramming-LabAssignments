<?php
class Student {
    private $name;
    private $id;
    private $cgpa;

    public function __construct($name, $id, $cgpa) {
        $this->name = $name;
        $this->id = $id;
        $this->cgpa = $cgpa;
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getCgpa() {
        return $this->cgpa;
    }
}

// Create two Student objects
$student1 = new Student("Sadiq", "2019-2-60-057", 3.7);
$student2 = new Student("Akash", "2019-2-60-056", 3.8);

// Calculate the average CGPA
$totalCgpa = $student1->getCgpa() + $student2->getCgpa();
$averageCgpa = $totalCgpa / 2;

echo "Student 1:\n";
echo"<br>";
echo "Name: " . $student1->getName();
echo"<br>";
echo "ID: " . $student1->getId();
echo"<br>";
echo "CGPA: " . $student1->getCgpa();
echo"<br>";
echo"<br>";

echo "\nStudent 2:\n";
echo"<br>";
echo "Name: " . $student2->getName();echo"<br>";
echo "ID: " . $student2->getId();echo"<br>";
echo "CGPA: " . $student2->getCgpa();echo"<br>";
echo"<br>";

echo "\nAverage CGPA of all students: " . $averageCgpa . "\n";

?>