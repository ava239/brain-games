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
            $startProgression = rand(MIN_NUMBER, MAX_NUMBER);
            $stepProgression = rand(MIN_NUMBER, MAX_NUMBER);
            $progression = [];
            for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
                $progression[] = $startProgression + $i * $stepProgression;
            }
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
    $startProgression = rand(MIN_NUMBER, MAX_NUMBER);
    $stepProgression = rand(MIN_NUMBER, MAX_NUMBER);
    $progression = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $progression[] = $startProgression + $i * $stepProgression;
    }
    return $progression;
}
