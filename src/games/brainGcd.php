#!/usr/bin/env php
<?php

namespace BrainGames\games\brainGcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\gameLogic\{answerIsCorrect, answerIsWrong, printYourAnswer, win};

function gcd($x, $y)
{
    if ($y == 0) {
        return $x;
    }
    return gcd($y, $x % $y);
}

function brainGcd($name)
{
    line('Find the greatest common divisor of given numbers.');

    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        Line("Question: %s %s", $a, $b);

        $correctAnswer = gcd($a, $b);
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
