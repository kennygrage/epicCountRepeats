<?php
    require_once "src/RepeatCounter.php";

    class RepeatCounterTest extends PHPUnit_Framework_TestCase {

        //Test 1: test to see if:
        //Sentance: a
        //Word: a
        //Returns: 1 match.
        //Why? To start with a simple test.
        function test_RepeatCounter_aAndAReturns1() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            $input_sentence = 'a';
            $input_word = 'a';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 2: test to see if:
        //Sentance: a
        //Word: z
        //Returns: 0 matches.
        //Why? Make sure it would not return a match if it didn't match.
        function test_RepeatCounter_aAndzReturns0() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            $input_sentence = 'a';
            $input_word = 'z';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals(0, $result);
        }


        //Test 3: test to see if:
        //Sentance: a z
        //Word: z
        //Returns: 1 match.
        //Why? Throw in a space to make sure we still get a match from "z".
        function test_RepeatCounter_zAnda_zReturns1() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            $input_sentence = 'a z';
            $input_word = 'z';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 4: test to see if:
        //Sentance: A z
        //Word: z
        //Returns: 1 match.
        //Why? Capialize a word to make sure my strtolower() worked.
        function test_RepeatCounter_zAnducA_zReturns1() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            $input_sentence = 'A z';
            $input_word = 'z';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 5: test to see if:
        //Sentance: A z
        //Word: z q
        //Returns: error
        //Why? Put a space in the $input_word to return an error.
        function test_RepeatCounter_z_qAnducA_zReturnsErr() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            $input_sentence = 'A z';
            $input_word = 'z q';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals("Matching word can only contain letters a-z.", $result);
        }


        //Test 6: test to see if:
        //Sentance: A z
        //Word: z+
        //Returns: error
        //Why? Put a special character to yell at the user for not being smart enough.
        function test_RepeatCounter_z_plusAnda_zReturnsErr() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            $input_sentence = 'a z';
            $input_word = 'z+';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals("Matching word can only contain letters a-z.", $result);
        }


        //Test 7: test to see if:
        //Sentance: Those darn greedy landlords!
        //Word: landlords
        //Returns: 1
        //Why? Put a special character in the sentance. We don't want an error, but we want to parse out the special character.
        function test_RepeatCounter_landlordsAndSentReturns1() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            //need to make sure to parse off the "!"and the end of landlords
            $input_sentence = 'Those darn greedy landlords!';
            $input_word = 'landlords';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


        //Test 8: test to see if:
        //Sentance: I am gonna to go to the store, except I don't like the store.
        //Word: store
        //Returns: 2
        //Why? To get not 1, but 2 matches from the sentence and check again the special characters are being parsed out.
        function test_RepeatCounter_storeAndSentReturns2() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            //instead let's just match the word with preg_match to parse off all non a-z characters
            //That way, "store," and "store." will match "store".
            $input_sentence = 'I am gonna to go to the store, except I don\'t like the store.';
            $input_word = 'store';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals(2, $result);
        }


        //Test 9: test to see if:
        //Sentance: I am going to the store together with my friends.
        //Word: to
        //Returns: 1
        //Why? Make sure part of a bigger word doesn't match a smaller and completely different word.
        function test_RepeatCounter_toAndSentReturns1() {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;
            $input_sentence = 'I am going to the store together with my friends.';
            //I realized after test 8 that the way I did it the word "to" would match "together", so I had to re-think what I was doing.
            //I made this test to make sure I only get one match from "to" instead of two matches: "to" and "together".
            $input_word = 'to';

            //Act
            $result = $test_RepeatCounter->RepeatCounter($input_sentence, $input_word);

            //Assert
            $this->assertEquals(1, $result);
        }


    }

?>
