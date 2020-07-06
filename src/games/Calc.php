<?php

namespace Brain\Games\Games\Calc;

use Brain\Games\Core;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const OPERATIONS = ['+', '-', '*'];

function run()
{
    $getGameData = function () {
        $operand1 = rand(MIN_NUMBER, MAX_NUMBER);
        $operand2 = rand(MIN_NUMBER, MAX_NUMBER);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $question = "$operand1 $operation $operand2";
        $answer = (string)calculateAnswer($operand1, $operand2, $operation);
        return [$question, $answer];
    };
    Core\playGame(GAME_DESCRIPTION, $getGameData);
}

function calculateAnswer(int $operand1, int $operand2, $operation)
{
    switch ($operation) {
        case '+':
            $result = $operand1 + $operand2;
            break;
        case '-':
            $result = $operand1 - $operand2;
            break;
        case '*':
            $result = $operand1 * $operand2;
            break;
        default:
            return false;
    }
    return $result;
}
