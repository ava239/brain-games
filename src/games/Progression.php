<?php

namespace Brain\Games\Games\Progression;

use Brain\Games\Core;

function run()
{
    Core\startGameFlow('What number is missing in the progression?', 'Progression');
}

function generateQuestionAndAnswer()
{
    [$progression, $answer] = generateQuestionData();
    $questionText = implode(' ', $progression);
    $answerText = (string)$answer;
    return [$questionText, $answerText];
}

function generateQuestionData()
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
    $answer = $progression[$hidePosition];
    $progression[$hidePosition] = '..';
    return [$progression, $answer];
}
