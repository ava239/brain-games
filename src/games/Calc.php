<?php

namespace Brain\Games\Games\Calc;

function getGameData()
{
    return 'What is the result of the expression?';
}

function question(): string
{
    $minInt = 1;
    $maxInt = 20;
    $operations = ['+', '-', '*'];
    $operand1 = rand($minInt, $maxInt);
    $operand2 = rand($minInt, $maxInt);
    $operation = $operations[rand(0, 2)];
    return $operand1 . ' ' . $operation . ' ' . $operand2;
}

function logic(string $question): string
{
    [$op1, $operation, $op2] = explode(' ', $question);
    $result = '';
    switch ($operation) {
        case '+':
            $result = (int)$op1 + (int)$op2;
            break;
        case '-':
            $result = (int)$op1 - (int)$op2;
            break;
        case '*':
            $result = (int)$op1 * (int)$op2;
    }
    return (string)$result;
}
