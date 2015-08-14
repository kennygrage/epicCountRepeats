<?php
    require_once "src/WordCount.php";

    class WordCountTest extends PHPUnit_Framework_TestCase {

        //Test 1: test to see if:
        //Sentance: a
        //Word: a
        //Returns: 1 match.
        function test_WordCount_aAndAReturns1() {
            //Arrange
            $test_WordCount = new WordCount;
            $input_sentence = 'a';
            $input_word = 'a';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 2: test to see if:
        //Sentance: a
        //Word: z
        //Returns: 0 matches.
        function test_WordCount_aAndzReturns0() {
            //Arrange
            $test_WordCount = new WordCount;
            $input_sentence = 'a';
            $input_word = 'z';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals(0, $result);
        }


        //Test 3: test to see if:
        //Sentance: a z
        //Word: z
        //Returns: 1 match.
        function test_WordCount_zAnda_zReturns1() {
            //Arrange
            $test_WordCount = new WordCount;
            $input_sentence = 'a z';
            $input_word = 'z';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 4: test to see if:
        //Sentance: A z
        //Word: z
        //Returns: 1 match.
        function test_WordCount_zAnducA_zReturns1() {
            //Arrange
            $test_WordCount = new WordCount;
            $input_sentence = 'A z';
            $input_word = 'z';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 5: test to see if:
        //Sentance: A z
        //Word: z q
        //Returns: error.
        function test_WordCount_z_qAnducA_zReturnsErr() {
            //Arrange
            $test_WordCount = new WordCount;
            $input_sentence = 'A z';
            $input_word = 'z q';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals("Matching word can only contain letters a-z.", $result);
        }


        //Test 6: test to see if:
        //Sentance: A z
        //Word: z+
        //Returns: error.
        function test_WordCount_z_plusAnda_zReturnsErr() {
            //Arrange
            $test_WordCount = new WordCount;
            $input_sentence = 'a z';
            $input_word = 'z+';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals("Matching word can only contain letters a-z.", $result);
        }

    }

?>
