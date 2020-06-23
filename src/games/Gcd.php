<?php

namespace Brain\Games\Games\Gcd;

function getGameData()
{
    return 'Find the greatest common divisor of given numbers.';
}

function question()
{
    $minInt = 1;
    $maxInt = 300;
    $operand1 = rand($minInt, $maxInt);
    $operand2 = rand($minInt, $maxInt);
    return $operand1 . ' ' . $operand2;
}

function logic(string $question): string
{
    [$a, $b] = explode(' ', $question);
    // euclidean algorithm gcd(a, b) = gcd(a % b, b)
    while ($b) {
        [$a, $b] = [$b, $a % $b];
    }
    return (string)$a;
}
