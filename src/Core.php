<?php

namespace Brain\Games\Core;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGameFlow($rules, $gameDataFunction)
{
    line('Welcome to the Brain Game!');
    line($rules);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$questionText, $answerText] = $gameDataFunction();
        line('Question: %s', $questionText);
        $answer = prompt('Your answer');
        if ($answer === $answerText) {
            line('Correct!');
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer,
                $answerText
            );
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
