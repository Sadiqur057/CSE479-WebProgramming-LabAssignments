<?php

class Calculator {
    private $myValue;

    public function __construct($value) {
        $this->myValue = $value;
    }

    public function setValue($value) {
        $this->myValue = $value;
    }

    public function square() {
        $result = $this->myValue * $this->myValue;
        echo "Square of {$this->myValue} is {$result}\n";
    }

    public function cube() {
        $result = $this->myValue * $this->myValue * $this->myValue;
        echo "Cube of {$this->myValue} is {$result}\n";
    }
}

// Create Calculator object and call square() and cube()
$calc1 = new Calculator(5.0);
$calc1->square();
echo"<br>";
$calc1->cube();
echo"<br>";

// Create Calculator object using constructor for myValue initialization
$calc2 = new Calculator(3.0);
$calc2->square();
echo"<br>";
$calc2->cube();

?>
