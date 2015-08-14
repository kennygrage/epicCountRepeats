<?php
    class RepeatCounter {
        function countRepeats($input_sentence, $input_word) {
            $count = 0; //count how many words

            //make sure we are comparing the same words without capitalization being a bother
            $input_sentence = strtolower($input_sentence);
            $input_word = strtolower($input_word);

            //using the lovely regex that I learned from Perl to match only a-z characters.
            $pattern = "/^[a-zA-Z]+$/";
            if (!(preg_match($pattern, $input_word))) {return "Matching word can only contain letters a-z.";}

            //make $input_sentance an array of words
            $input_sentence_array = explode(" ", $input_sentence);

            //look at each word and lets get to matching!
            foreach ($input_sentence_array as $word_in_sentence) {
                //we want to look at each letter in the word (from the sentence) to make sure there are no non a-z characters.
                //If there are we are not gonna error out like we did with the $input_word, we are just gonna reconstruct the
                //word without the special characters. So "store," will become "store".
                $letter_in_word_array = str_split($word_in_sentence);
                $word_in_sentence = ""; //removing the word from that variable only to add it back minus any non a-z characters
                foreach ($letter_in_word_array as $letter) {
                    if (preg_match($pattern, $letter)) {$word_in_sentence .= $letter;} //add that $letter to $word_in_sentance only if it is a-z
                }
                if ($word_in_sentence == $input_word) {$count++;}
            }

            return $count;

            //Gosh, I have always been misspelling the word "sentence".
            //I keep wanting to write "sentance" and now it is giving me errors
            //because that is a completely different variable to PHP.


            //When you said check for full word matches only I knew you didn't want "to"
            //to match "together", but I was unsure if you wanted "landlord" to match
            //"landlords". I am assuming you meant no because you said full word matches
            //only.
        }



    }
?>
