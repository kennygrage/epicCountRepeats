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
        //Returns: error
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
        //Returns: error
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


        //Test 7: test to see if:
        //Sentance: Those darn greedy landlords!
        //Word: landlords
        //Returns: 1
        function test_WordCount_landlordsAndSentReturns1() {
            //Arrange
            $test_WordCount = new WordCount;
            //need to make sure to parse off the "!"and the end of landlords
            $input_sentence = 'Those darn greedy landlords!';
            $input_word = 'landlords';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 8: test to see if:
        //Sentance: I am gonna to go to the store, except I don't like the store.
        //Word: store
        //Returns: 2
        function test_WordCount_storeAndSentReturns2() {
            //Arrange
            $test_WordCount = new WordCount;
            //instead let's just match the word with preg_match to parse off all non a-z characters
            //That way, "store," and "store." will match "store".
            $input_sentence = 'I am gonna to go to the store, except I don\'t like the store.';
            $input_word = 'store';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals(2, $result);
        }


        //Test 9: test to see if:
        //Sentance: I am going to the store together with my friends.
        //Word: to
        //Returns: 1
        function test_WordCount_toAndSentReturns1() {
            //Arrange
            $test_WordCount = new WordCount;
            $input_sentence = 'I am going to the store together with my friends.';
            //I realized after test 8 that the way I did it the word "to" would match "together", so I had to re-think what I was doing.
            //I made this test to make sure I only get one match from "to" instead of two matches: "to" and "together".
            $input_word = 'to';

            //Act
            $result = $test_WordCount->calcSent($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


    }

?>
