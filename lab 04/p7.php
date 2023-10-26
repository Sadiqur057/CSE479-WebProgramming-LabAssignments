<?php
$string = "Hello!@# World*-";

$specialChars = ['!', '@', '#', '$', '%', '^', '&', '*', '-', '_', '=', '+', '\\', '<', '>', '?', '/'];

$cleanString = str_replace($specialChars, '', $string);

echo $cleanString;
?>
