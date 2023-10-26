<?php

class Box {
    private $length;
    private $width;
    private $height;

    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea() {
        $area = 2 * (($this->length * $this->width) + ($this->width * $this->height) + ($this->height * $this->length));
        return $area;
    }
}

// Create a Box object
$box = new Box(5, 3, 4);

// Calculate and output the area
$area = $box->getArea();
echo "Area of the box: " . $area . "\n";


?>