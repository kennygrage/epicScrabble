<?php
    class ScrabbleCalc {
        function calcValue($input) {
            $total_value_of_word = 0;
            $input = strtolower($input);
            $array_input = str_split($input);

            foreach ($array_input as $letter) {
                $ascii_value = ord($letter);
                $letter_place = $ascii_value - 97;
                if ($letter_place < 0 || $letter_place > 25) {
                    if($letter_place == -65) {
                        return "Please enter one word at a time";
                    }
                    else {
                        return "\"$letter\" is not a valid character";
                    }
                }
                $total_value_of_word += ScrabbleCalc::getPointValue($letter_place);
            }

            return $total_value_of_word;
        }

        function getPointValue($letter_place) {
            $letter_value_array = array(1,3,3,2,1,4,2,4,1,8,5,1,3,1,1,3,10,1,1,1,1,4,4,8,4,10);
            return ($letter_value_array[$letter_place]);
        }
    }
?>
