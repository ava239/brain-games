<?php

namespace Brain\Games\Games\Prime;

use Brain\Games\Core;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_NUMBER = 0;
const MAX_NUMBER = 499;

function run()
{
    $getGameData = function () {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        // generate only odd numbers, to make questions more challenging
        $number = $number * 2 + 1;
        $question = (string)$number;
        $answer = isPrime($number) ? 'yes' : 'no';
        return [$question, $answer];
    };
    Core\playGame(GAME_DESCRIPTION, $getGameData);
}

function isPrime(int $number): bool
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
