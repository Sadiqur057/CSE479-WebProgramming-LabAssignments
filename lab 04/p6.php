<?php
$string = 'The quick brown [dog].';

preg_match('/\[(.*?)\]/', $string, $matches);

if (isset($matches[1])) {
    $extractedText = $matches[1];
    echo $extractedText;
} else {
    echo "No text within parenthesis found.";
}
?>
