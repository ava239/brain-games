<?php

namespace Brain\Games\Core;

use function cli\line;
use function cli\prompt;

function showWelcomeRulesAndAskName($rules)
{
    line('Welcome to the Brain Game!');
    line($rules);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function startGameFlow($rules, $game)
{
    $name = showWelcomeRulesAndAskName($rules);
    $question = $correct = 0;
    $maxQuestions = 3;
    while ($question < $maxQuestions && $question === $correct) {
        $question++;
        if (playOneGameRound($game)) {
            $correct++;
        }
    }
    if ($question === $correct) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function generateQuestionAndAnswer($game)
{
    [$question, $answer] = call_user_func("Brain\\Games\\Games\\{$game}\\generateQuestionAndAnswer");
    return [$question, $answer];
}

function playOneGameRound($game)
{
    [$questionText, $answerText] = generateQuestionAndAnswer($game);
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
