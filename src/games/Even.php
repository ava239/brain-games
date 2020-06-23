<?php

namespace Brain\Games\Games\Even;

function getGameData()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function question(): string
{
    $minInt = 1;
    $maxInt = 300;
    $question = rand($minInt, $maxInt);
    return (string)$question;
}

function logic(string $question): string
{
    return $question % 2 === 0 ? 'yes' : 'no';
}
