<?php
// Project 1: Number Classifier

$number = 0;
$type = " ";
$parity = " ";


if ($number > 0) {
    $type = "Possitive";
} else if($number < 0) {
    $type = "Negative";
}else{
    $type = "Zero";
}

if ($number % 2 == 0) {
    $parity = "Even";
} else {
    $parity = "Odd";
}

echo "The number $number is $type and $parity";
