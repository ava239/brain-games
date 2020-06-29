<?php

namespace Brain\Games\Core;

use function cli\line;
use function cli\prompt;

function startGameFlow($rules, $generateFunction)
{
    line('Welcome to the Brain Game!');
    line($rules);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $question = $correct = 0;
    $maxQuestions = 3;
    while ($question < $maxQuestions && $question === $correct) {
        $question++;
        if (playOneGameRound($generateFunction)) {
            $correct++;
        }
    }
    if ($question === $correct) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function playOneGameRound($generateFunction)
{
    [$questionText, $answerText] = $generateFunction();
    line('Question: %s', $questionText);
    $answer = prompt('Your answer');
    if ($answer === $answerText) {
        line('Correct!');
        return true;
    } else {
        line(
            "'%s' is wrong answer ;(. Correct answer was '%s'.",
            $answer,
            $answerText
        );
        return false;
    }
}
