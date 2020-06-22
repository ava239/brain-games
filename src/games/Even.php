<?php

namespace Brain\Games\Games\Even;

function getGameData()
{
    return [
        'rules' => 'Answer "yes" if the number is even, otherwise answer "no".',
    ];
}

function question()
{
    $minInt = 1;
    $maxInt = 300;
    $question = rand($minInt, $maxInt);
    $answer = $question % 2 === 0 ? 'yes' : 'no';
    return [$question, $answer];
}
