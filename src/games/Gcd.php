<?php

namespace Brain\Games\Games\Gcd;

use Brain\Games\Core;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';
const MIN_NUMBER = 1;
const MAX_NUMBER = 300;

function run()
{
    Core\startGameFlow(
        GAME_RULES,
        function () {
            $operand1 = rand(MIN_NUMBER, MAX_NUMBER);
            $operand2 = rand(MIN_NUMBER, MAX_NUMBER);
            $question = $operand1 . ' ' . $operand2;
            $answer = (string)findGCD($operand1, $operand2);
            return [$question, $answer];
        }
    );
}

function findGCD($a, $b)
{
    // euclidean algorithm gcd(a, b) = gcd(a % b, b)
    while ($b) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}
