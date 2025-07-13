<?php

$questions = [
    ['questions' => 'what is 10 + 10', 'correct' => '20'],
    ['questions' => 'what is 20 + 10', 'correct' => '30'],
    ['questions' => 'what is Your user name', 'correct' => 'admin'],

];


$answers = [];


foreach ($questions as $index => $question) {
    echo ($index + 1) . "." . $question['questions'] . "\n";
    $answers[] = trim(readline("Your Answer: "));
}


function evaluateQuiz(array $questions, array $answers): int
{
    $score = 0;

    foreach ($questions as $index => $question) {
        if ($answers[$index] === $question['correct']) {
            $score++;
        }
    }
    return $score;
}


$myScore = evaluateQuiz($questions, $answers);
echo "\n Your Scored $myScore out of " . count($questions) . "\n";


if ($myScore === count($questions)) {
    echo "Excellent Job: \n";
} elseif ($myScore >= 1) {
    echo "Good effort. \n";
} else {
    echo "Your result is faild.please try again \n";
}
