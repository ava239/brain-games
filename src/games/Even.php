<?php

namespace Brain\Games\Games\Even;

use Brain\Games\Core;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_NUMBER = 1;
const MAX_NUMBER = 300;

function run()
{
    $getGameData = function () {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $question = (string)$number;
        $answer = isEven($number) ? 'yes' : 'no';
        return [$question, $answer];
    };
    Core\playGame(GAME_DESCRIPTION, $getGameData);
}

function isEven($number): bool
{
    return $number % 2 === 0;
}
