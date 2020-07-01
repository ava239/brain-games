<?php

namespace Brain\Games\Games\Prime;

use Brain\Games\Core;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_NUMBER = 1;
const MAX_NUMBER = 500;

function run()
{
    Core\startGameFlow(
        GAME_RULES,
        function () {
            $number = rand(MIN_NUMBER, MAX_NUMBER);
            // generate only odd numbers, to make questions more challenging
            $number = $number * 2 + 1;
            $question = (string)$number;
            $answer = isPrime($number) ? 'yes' : 'no';
            return [$question, $answer];
        }
    );
}

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }
    for ($j = 2, $maxPossibleDivisor = $number / 2; $j <= $maxPossibleDivisor; $j++) {
        if ($number % $j === 0) {
            return false;
        }
    }
    return true;
}
