<?php

namespace Brain\Games\Games\Calc;

function getGameData()
{
    return [
        'rules' => 'What is the result of the expression?',
    ];
}

function question()
{
    $minInt = 1;
    $maxInt = 20;
    $operations = ['+', '-', '*'];
    $operand1 = rand($minInt, $maxInt);
    $operand2 = rand($minInt, $maxInt);
    $operation = $operations[rand(0, 2)];
    $question = $operand1 . ' ' . $operation . ' ' . $operand2;
    $answer = (string)eval("return $question;");
    return [$question, $answer];
}
