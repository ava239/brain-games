<?php

namespace Brain\Games\Games\Prime;

function getGameData()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function question()
{
    $minInt = 1;
    $maxInt = 500;
    $number = rand($minInt, $maxInt);
    $number = $number * 2 + 1;
    return (string)$number;
}

function logic(string $question): string
{
    $number = (int)$question;
    $result = ($number > 1);
    for ($j = 2, $limit = $number / 2; $j <= $limit; $j++) {
        $result = $result && ($number % $j !== 0);
    }
    return $result ? 'yes' : 'no';
}
