<?php

namespace Brain\Games\Games\Prime;

use Brain\Games\Core;

function run()
{
    Core\startGameFlow('Answer "yes" if given number is prime. Otherwise answer "no".', 'Prime');
}

function generateQuestionAndAnswer()
{
    $int = generateQuestionData();
    $questionText = (string)$int;
    $answerText = (string)calculateAnswer($int);
    return [$questionText, $answerText];
}

function generateQuestionData()
{
    $minInt = 1;
    $maxInt = 500;
    $number = rand($minInt, $maxInt);
    // generate only odd numbers, to make questions more challenging
    $number = $number * 2 + 1;
    return $number;
}

function calculateAnswer($number)
{
    return isPrime($number) ? 'yes' : 'no';
}

function isPrime($number)
{
    $result = ($number > 1);
    for ($j = 2, $limit = $number / 2; $j <= $limit; $j++) {
        $result = $result && ($number % $j !== 0);
    }
    return $result;
}
