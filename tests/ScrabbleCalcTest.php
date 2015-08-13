<?php
    require_once "src/ScrabbleCalc.php";

    class ScrabbleCalcTest extends PHPUnit_Framework_TestCase {

        function test_ScrabbleCalc_aReturns1Point() {
            //Arrange
            $test_ScrabbleCalc = new ScrabbleCalc;
            $input = 'a';

            //Act
            $result = $test_ScrabbleCalc->calcValue($input);

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_ScrabbleCalc_plusSignReturnsError() {
            //Arrange
            $test_ScrabbleCalc = new ScrabbleCalc;
            $input = '+';

            //Act
            $result = $test_ScrabbleCalc->calcValue($input);

            //Assert
            $this->assertEquals("+ is not a valid character", $result);
        }

        function test_ScrabbleCalc_catReturns5Points() {
            //Arrange
            $test_ScrabbleCalc = new ScrabbleCalc;
            $input = 'cat';

            //Act
            $result = $test_ScrabbleCalc->calcValue($input);

            //Assert
            $this->assertEquals(5, $result);
        }

        function test_ScrabbleCalc_catminusReturnsError() {
            //Arrange
            $test_ScrabbleCalc = new ScrabbleCalc;
            $input = 'cat-';

            //Act
            $result = $test_ScrabbleCalc->calcValue($input);

            //Assert
            $this->assertEquals("- is not a valid character", $result);
        }

        function test_ScrabbleCalc_cat_hatReturnsError() {
            //Arrange
            $test_ScrabbleCalc = new ScrabbleCalc;
            $input = 'cat hat';

            //Act
            $result = $test_ScrabbleCalc->calcValue($input);

            //Assert
            $this->assertEquals("Please enter one word at a time", $result);
        }

    }
?>
