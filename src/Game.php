<?php

namespace Brain\Games\Game;

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function run()
{
    $name = welcome();
    $question = $correct = 0;
    $maxQuestions = 3;
    while ($question < $maxQuestions && $question === $correct) {
        $question++;
        if (question()) {
            $correct++;
        }
    }
    if ($question === $correct) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function question()
{
    $minInt = 1;
    $maxInt = 300;
    $randomInt = rand($minInt, $maxInt);
    line('Question: %s', $randomInt);
    $supposedAnswer = $randomInt % 2 === 0 ? 'yes' : 'no';
    $answer = prompt('Your answer');
    if ($answer === $supposedAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $supposedAnswer);
        return false;
    }
}
