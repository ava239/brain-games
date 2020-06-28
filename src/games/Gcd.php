<?php

namespace Brain\Games\Games\Gcd;

use Brain\Games\Core;

function run()
{
    Core\startGameFlow('Find the greatest common divisor of given numbers.', 'Gcd');
}

function generateQuestionAndAnswer()
{
    [$operand1, $operand2] = generateQuestionData();
    $questionText = $operand1 . ' ' . $operand2;
    $answerText = calculateAnswer($operand1, $operand2);
    return [$questionText, $answerText];
}

function generateQuestionData()
{
    $minInt = 1;
    $maxInt = 300;
    $operand1 = rand($minInt, $maxInt);
    $operand2 = rand($minInt, $maxInt);
    return [$operand1, $operand2];
}

function calculateAnswer($a, $b)
{
    // euclidean algorithm gcd(a, b) = gcd(a % b, b)
    while ($b) {
        [$a, $b] = [$b, $a % $b];
    }
    return (string)$a;
}
