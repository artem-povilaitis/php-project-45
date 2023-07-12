#!/usr/bin/env php
<?php

namespace BrainGames\games\brainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\gameLogic\{answerIsCorrect, answerIsWrong, printYourAnswer, win};

function calc($a, $b, $arithmeticSymbol)
{
    if ($arithmeticSymbol === '+') {
        return $a + $b;
    }
    if ($arithmeticSymbol === '-') {
        return $a - $b;
    }
    if ($arithmeticSymbol === '*') {
        return $a * $b;
    }
}

function brainCalc($name = 'examplenmame')
{
    line('What is the result of the expression?');

    $arithmeticSymbols = ['+', '-', '*'];

    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $arithmeticSymbol = $arithmeticSymbols[array_rand($arithmeticSymbols)];

        line("Question: %s %s %s", $a, $arithmeticSymbol, $b);
        $correctAnswer = calc($a, $b, $arithmeticSymbol);
        $userAsnswer = printYourAnswer();

        if ($correctAnswer == $userAsnswer) {
            answerIsCorrect();
            $correctAnswers++;
        } else {
            answerIsWrong($userAsnswer, $correctAnswer, $name);
            return false;
        }
    }
    win($name);
}
