<?php

namespace Brain\Games\Games\Progression;

function getGameData()
{
    return 'What number is missing in the progression?';
}

function question()
{
    $minInt = 1;
    $maxInt = 20;
    $startProgression = rand($minInt, $maxInt);
    $stepProgression = rand($minInt, $maxInt);
    $length = 10;
    $hidePosition = rand(0, $length - 1);
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $startProgression + $i * $stepProgression;
    }
    $progression[$hidePosition] = '..';
    return implode(' ', $progression);
}

function logic(string $question): string
{
    $progression = explode(' ', $question);
    for ($i = 1, $len = count($progression); $i < $len; $i++) {
        if ($progression[$i] !== '..' && $progression[$i - 1] !== '..') {
            $stepProgression = $progression[$i] - $progression[$i - 1];
            $startProgression = $progression[$i] - $stepProgression * $i;
            break;
        }
    }
    foreach ($progression as $key => $value) {
        if ($value === '..') {
            $answer = $startProgression + $key * $stepProgression;
        }
    }
    return (string)$answer;
}
