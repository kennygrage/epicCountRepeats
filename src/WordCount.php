<?php
    class WordCount {
        function calcSent($input_sentence, $input_word) {
            $count = 0; //count how many words

            //make sure we are comparing the same words without capitalization being a bother
            $input_sentence = strtolower($input_sentence);
            $input_word = strtolower($input_word);

            $pattern = "/^[a-zA-Z]+$/";
            if (!(preg_match($pattern, $input_word))) {return "Matching word can only contain letters a-z.";}

            //make $input_sentance an array of words
            $input_sentence_array = explode(" ", $input_sentence);

            //look at each word and lets get to matching!
            foreach ($input_sentence_array as $word_in_sentence) {
                $word_pattern = "/" . $input_word . "/";
                if (preg_match($word_pattern, $word_in_sentence)) {$count++;}
            }

            return $count;

        }
    }
?>
