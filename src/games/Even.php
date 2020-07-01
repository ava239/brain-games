<?php

namespace Brain\Games\Games\Even;

use Brain\Games\Core;

const GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_NUMBER = 1;
const MAX_NUMBER = 300;

function run()
{
    Core\startGameFlow(
        GAME_RULES,
        function () {
            $int = rand(MIN_NUMBER, MAX_NUMBER);
            $question = (string)$int;
            $answer = isEven($int) ? 'yes' : 'no';
            return [$question, $answer];
        }
    );
}

function isEven($int)
{
    return $int % 2 === 0;
}
