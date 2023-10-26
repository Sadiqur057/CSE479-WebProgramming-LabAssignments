<?php

class Circle {
    private $radius;

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function calculateCircumference() {
        $circumference = 2 * M_PI * $this->radius;
        return $circumference;
    }

    public function calculateArea() {
        $area = M_PI * pow($this->radius, 2);
        return $area;
    }
}

// Create a Circle object
$circle = new Circle();

// Set radius
$circle->setRadius(5);

// Calculate and output circumference
$circumference = $circle->calculateCircumference();
echo "Circumference: " . $circumference;
echo"<br>";
// Calculate and output area
$area = $circle->calculateArea();
echo "Area: " . $area;


?>