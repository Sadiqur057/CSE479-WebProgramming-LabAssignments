<?php

class Rectangle {
    private $width, $height;

    public function __construct($w, $h) {
        $this->width = $w;
        $this->height = $h;
    }

    public function setWidth($w) {
        $this->width = $w;
    }

    public function setHeight($h) {
        $this->height = $h;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function showArea() {
        $area = $this->width * $this->height;
        echo "Area: " . $area . "\n";
    }
}

// b. multiple objects of rectangle class
$rectangle1 = new Rectangle(5, 10);
$rectangle2 = new Rectangle(8, 12);

// c. Set dimensions of each rectangle objects
$rectangle1->setWidth(7);
$rectangle1->setHeight(15);

$rectangle2->setWidth(10);
$rectangle2->setHeight(6);

// d. Output areas using showArea() function
echo "Rectangle 1 ";
$rectangle1->showArea();
echo"<br>";

echo "Rectangle 2 ";
$rectangle2->showArea();
echo"<br>";

// e. Using constructor to initialize width and height
$rectangle3 = new Rectangle(3, 4);
$rectangle4 = new Rectangle(6, 8);

echo "Rectangle 3 ";
$rectangle3->showArea();
echo"<br>";

echo "Rectangle 4 ";
$rectangle4->showArea();

?>
