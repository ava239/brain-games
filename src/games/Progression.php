<?php

namespace Brain\Games\Games\Progression;

use Brain\Games\Core;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const PROGRESSION_LENGTH = 10;

function run()
{
    $getGameData = function () {
        $progressionStart = rand(MIN_NUMBER, MAX_NUMBER);
        $progressionStep = rand(MIN_NUMBER, MAX_NUMBER);
        $progression = getProgression($progressionStart, $progressionStep, PROGRESSION_LENGTH);
        $hidePosition = array_rand($progression);
        $progression[$hidePosition] = '..';
        $question = implode(' ', $progression);
        $answer = (string)($progressionStart + $hidePosition * $progressionStep);
        return [$question, $answer];
    };
    Core\playGame(GAME_DESCRIPTION, $getGameData);
}

function getProgression($startingElement, $step, $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $startingElement + $i * $step;
    }
    return $progression;
}
