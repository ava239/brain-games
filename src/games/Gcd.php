<?php

namespace Brain\Games\Games\Gcd;

use Brain\Games\Core;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_NUMBER = 1;
const MAX_NUMBER = 300;

function run()
{
    $getGameData = function () {
        $operand1 = rand(MIN_NUMBER, MAX_NUMBER);
        $operand2 = rand(MIN_NUMBER, MAX_NUMBER);
        $question = "$operand1 $operand2";
        $answer = (string)findGCD($operand1, $operand2);
        return [$question, $answer];
    };
    Core\playGame(GAME_DESCRIPTION, $getGameData);
}

function findGCD(int $a, int $b)
{
    // euclidean algorithm gcd(a, b) = gcd(a % b, b)
    while ($b) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}
