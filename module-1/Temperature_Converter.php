<?php
// Project 2: Temperature Converter

echo "Enter your temperature: ";
$temperature = (float)readline();
echo "Convert to: (F:fahrenheit ,C: celcius)";

$choice = readline();

if ($choice == "C") {
    $result = ($temperature - 32) * 5 / 9;
    echo "Celcius temperature is : $result";
} elseif ($choice == "F") {
    $result =  ($temperature * 9 / 5) + 32;
    echo "Fahrenheit tempetature is : $result";
}
