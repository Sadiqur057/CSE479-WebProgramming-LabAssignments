<?php
    function changeCase($array, $case) {
        $result = [];

        foreach ($array as $key => $value) {
            $modifiedValue = '';
            for ($i = 0; $i < strlen($value); $i++) {
                $char = $value[$i];
                $ascii = ord($char);
                if ($case === 'lower' && $ascii >= 65 && $ascii <= 90) {
                    $char = chr($ascii + 32);
                }
                if ($case === 'upper' && $ascii >= 97 && $ascii <= 122) {
                    $char = chr($ascii - 32);
                }

                $modifiedValue .= $char;
            }

            $result[$key] = $modifiedValue;
        }

        return $result;
    }

    $Color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
    $lowerCaseColor = changeCase($Color, 'lower');
    echo "Values are in lower case." . PHP_EOL;
    print_r($lowerCaseColor);
    echo "<br>";

    $upperCaseColor = changeCase($Color, 'upper');
    echo "Values are in upper case." . PHP_EOL;
    print_r($upperCaseColor);

?>