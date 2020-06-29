<?php

namespace Brain\Games\Games\Even;

use Brain\Games\Core;

function run()
{
    Core\startGameFlow(
        'Answer "yes" if the number is even, otherwise answer "no".',
        function () {
            $int = generateQuestionData();
            $questionText = (string)$int;
            $answerText = calculateAnswer($int);
            return [$questionText, $answerText];
        }
    );
}

function generateQuestionData()
{
    $minInt = 1;
    $maxInt = 300;
    return rand($minInt, $maxInt);
}

function calculateAnswer($int)
{
    return isEven($int) ? 'yes' : 'no';
}

function isEven($int)
{
    return $int % 2 === 0;
}
