<?php

namespace Brain\Games\Games\Calc;

use Brain\Games\Core;

function run()
{
    Core\startGameFlow(
        'What is the result of the expression?',
        function () {
            [$operand1, $operand2, $operation] = generateQuestionData();
            $questionText = $operand1 . ' ' . $operation . ' ' . $operand2;
            $answerText = calculateAnswer($operand1, $operand2, $operation);
            return [$questionText, $answerText];
        }
    );
}

function generateQuestionData()
{
    $minInt = 1;
    $maxInt = 20;
    $operations = ['+', '-', '*'];
    $operand1 = rand($minInt, $maxInt);
    $operand2 = rand($minInt, $maxInt);
    $operation = $operations[rand(0, 2)];
    return [$operand1, $operand2, $operation];
}

function calculateAnswer($operand1, $operand2, $operation)
{
    $result = '';
    switch ($operation) {
        case '+':
            $result = (int)$operand1 + (int)$operand2;
            break;
        case '-':
            $result = (int)$operand1 - (int)$operand2;
            break;
        case '*':
            $result = (int)$operand1 * (int)$operand2;
    }
    return (string)$result;
}
