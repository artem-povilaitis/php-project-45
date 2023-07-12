#!/usr/bin/env php
<?php

namespace BrainGames\games\brainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\gameLogic\{answerIsCorrect, answerIsWrong, printYourAnswer, win};

function isEven($number)
{
    return $number % 2 ? false : true;
}

function yesOrNo($word)
{
    $word = mb_strtolower($word);
    if ($word === 'yes') {
        return true;
    }
    if ($word === 'no') {
        return false;
    }

    return null;
}

function brainEven($name = 'examplename')
{
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $number = rand(1, 100);
        line("Question: %s", $number);
        $answer = printYourAnswer();


        if (isEven($number) === yesOrNo($answer)) {
            answerIsCorrect();
            $correctAnswers++;
        } else {
            $correctAnswer = isEven($number) ? 'yes' : 'no';
            answerIsWrong($answer, $correctAnswer, $name);
            return false;
        }
    }
    win($name);
}
