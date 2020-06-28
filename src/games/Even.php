<?php

namespace Brain\Games\Games\Even;

use Brain\Games\Core;

function run()
{
    Core\startGameFlow('Answer "yes" if the number is even, otherwise answer "no".', 'Even');
}

function generateQuestionAndAnswer()
{
    $int = generateQuestionData();
    $questionText = (string)$int;
    $answerText = calculateAnswer($int);
    return [$questionText, $answerText];
}

function generateQuestionData()
{
    $minInt = 1;
    $maxInt = 300;
    return rand($minInt, $maxInt);
}

function calculateAnswer($int)
{
    return $int % 2 === 0 ? 'yes' : 'no';
}
