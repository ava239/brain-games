<?php

namespace Brain\Games\Games\Progression;

use Brain\Games\Core;

const GAME_RULES = 'What number is missing in the progression?';
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const PROGRESSION_LENGTH = 10;

function run()
{
    Core\startGameFlow(
        GAME_RULES,
        function () {
            $progression = generateProgression();
            $hidePosition = rand(0, count($progression) - 1);
            $answer = (string)$progression[$hidePosition];
            $progression[$hidePosition] = '..';
            $question = implode(' ', $progression);
            return [$question, $answer];
        }
    );
}

function generateProgression(): array
{
    $progressionStart = rand(MIN_NUMBER, MAX_NUMBER);
    $progressionStep = rand(MIN_NUMBER, MAX_NUMBER);
    $progression = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $progression[] = $progressionStart + $i * $progressionStep;
    }
    return $progression;
}
