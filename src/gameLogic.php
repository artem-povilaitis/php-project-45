#!/usr/bin/env php
<?php

namespace BrainGames\gameLogic;

use function cli\line;
use function cli\prompt;

function yesOrNo($word)
{
    //$word = mb_strtolower($word);
    if ($word === 'yes') {
        return true;
    }
    if ($word === 'no') {
        return false;
    }

    return null;
}

function answerIsWrong($wrongAnswer, $correctAnswer, $name)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'", $wrongAnswer, $correctAnswer);
    line(" Let's try again, %s!", $name);
}

function answerIsCorrect()
{
    line("Correct!");
}

function printYourAnswer()
{
    return prompt('Your answer');
}

function win($name)
{
    line('Congratulations, %s', $name);
}
