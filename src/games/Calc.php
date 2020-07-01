<?php

namespace Brain\Games\Games\Calc;

use Brain\Games\Core;

const GAME_RULES = 'What is the result of the expression?';
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const OPERATIONS = ['+', '-', '*'];

function run()
{
    Core\startGameFlow(
        GAME_RULES,
        function () {
            $operand1 = rand(MIN_NUMBER, MAX_NUMBER);
            $operand2 = rand(MIN_NUMBER, MAX_NUMBER);
            $operation = OPERATIONS[rand(0, count(OPERATIONS) - 1)];
            $question = $operand1 . ' ' . $operation . ' ' . $operand2;
            $answer = (string)calculateAnswer($operand1, $operand2, $operation);
            return [$question, $answer];
        }
    );
}

function calculateAnswer($operand1, $operand2, $operation)
{
    switch ($operation) {
        case '+':
            $result = (int)$operand1 + (int)$operand2;
            break;
        case '-':
            $result = (int)$operand1 - (int)$operand2;
            break;
        case '*':
            $result = (int)$operand1 * (int)$operand2;
            break;
        default:
            $result = false;
    }
    return $result;
}
