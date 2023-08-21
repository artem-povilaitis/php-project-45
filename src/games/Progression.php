#!/usr/bin/env php
<?php

namespace BrainGames\games\brainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\{answerIsCorrect, answerIsWrong, printYourAnswer, win};

function runProgression()
{
    $step = rand(1, 15);
    $currentElement = rand(1, 50);
    $progressionSize = rand(5, 11);
    $progression = [];
    for ($i = 0; $i < $progressionSize; $i++) {
        $progression[$i] = $currentElement;
        $currentElement += $progressionSize;
    }
    return $progression;
}

function takeRandomElement(&$progression)
{
    $keyOfElement = array_rand($progression);
    $answer = $progression[$keyOfElement];
    $progression[$keyOfElement] = '..';
    return $answer;
}

function brainProgression($name = 'examplenmame')
{
    line('What number is missing in the progression?');

    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $progression = createProgression();
        $correctAnswer = takeRandomElement($progression);
        $outputString = implode(' ', $progression);
        line("Question: %s", $outputString);

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
