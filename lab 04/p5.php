<?php
$sequence = '#1-2_3#4_5-6#7-8_9#10_';
$trimmedSequence = preg_replace('/^[-_#]|[-_#]$/', '', $sequence);
echo $trimmedSequence;
?>
