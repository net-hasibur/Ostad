<?php
// Project 3: Basic Auth System

const username = "admin";
const password = 1234;

echo "Enter your user name: ";
$us_name = readline();
echo "Enter your password: ";
$pass = (int)readline();


if (empty($us_name)  || empty($pass)) {
    echo "User name or Password Blank";
} else {
    if ($us_name === username && $pass === password) {
        echo "Login Successful";
    } else {
        echo "Invalid username or password";
    }
}
