<?php

$string = ["Hello", "World", "PHP", "Programming"];

foreach ($string as $word) {
    $vowel = countVowel($word);
    $reversed = reverseString($word);

    echo "Original String: $word, Vowel Count: $vowel, Reversed String: $reversed\n\n";
}

function countVowel($word): int {
    $vowel = 0;

    foreach (str_split(strtolower($word)) as $letter) {
        if ($letter == "a" || $letter == "e" || $letter == "i" || $letter == "o" || $letter == "u") {
            $vowel++;
        }
    }
    
    return $vowel;
}

function reverseString($word): string {
    $reversed = "";

    for ($i = strlen($word) - 1; $i >= 0; $i--) {
        $reversed .= $word[$i];
    }

    return $reversed;
}