<?php

namespace Brain\Games\Games;

use function cli\line;
use function cli\prompt;

function welcome($rules)
{
    line('Welcome to the Brain Game!');
    line($rules);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function run($game)
{
    $dataFunction = "\\Brain\\Games\\Games\\{$game}\\getGameData";
    $questionFunction = "\\Brain\\Games\\Games\\{$game}\\question";
    $gameData = $dataFunction();
    $name = welcome($gameData['rules']);
    $question = $correct = 0;
    $maxQuestions = 3;
    while ($question < $maxQuestions && $question === $correct) {
        $question++;
        if (question($questionFunction)) {
            $correct++;
        }
    }
    if ($question === $correct) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function question($question)
{
    [$questionText, $answerText] = $question();
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
