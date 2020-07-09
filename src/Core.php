<?php

namespace Brain\Games\Core;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function playGame($description, $getGameData)
{
    line('Welcome to the Brain Game!');
    line($description);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $getGameData();
        line('Question: %s', $question);
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer,
                $correctAnswer
            );
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
