<?php

namespace Brain\Games\Games;

use function cli\line;
use function cli\prompt;

function welcome($game)
{
    $rules = call_user_func(__NAMESPACE__ . "\\{$game}\\getGameData");
    line('Welcome to the Brain Game!');
    line($rules);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function run($game)
{
    $name = welcome($game);
    $question = 0;
    $maxQuestions = 3;
    for ($i = 0; $i < $maxQuestions; $i++) {
        if (questionIteration($game)) {
            $question++;
        } else {
            break;
        }
    }
    if ($question === $maxQuestions) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function question($game)
{
    $question = call_user_func(__NAMESPACE__ . "\\{$game}\\question");
    $answer = call_user_func(__NAMESPACE__ . "\\{$game}\\logic", $question);
    return [$question, $answer];
}

function questionIteration($game)
{
    [$questionText, $answerText] = question($game);
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
