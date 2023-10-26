<?php
    $size = 5; 
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $i; $j++) {
            echo "&nbsp;&nbsp;";
        }
        for ($k = 0; $k < ($size - $i) * 2 - 1; $k++) {
            echo "*";
        }
        echo "<br>";
    }
    for ($i = 2; $i <= $size; $i++) {
        for ($j = $size; $j > $i; $j--) {
            echo "&nbsp;&nbsp;";
        }
        for ($k = 0; $k < $i * 2 - 1; $k++) {
            echo "*";
        }
        echo "<br>";
    }
?>