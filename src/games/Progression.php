#!/usr/bin/env php
<?php

namespace BrainGames\games\progression;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function runProgressionGame()
{
    $gameData = [];
    $gameRules = 'What number is missing in the progression?';
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[$i] = createProgressionRound();
    }
    playGame($gameData, $gameRules);
}

function createProgression()
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

function createProgressionRound()
{

    $progression = createProgression();
    $correctAnswer = takeRandomElement($progression);
    $outputString = implode(' ', $progression);

    $output = [];


    $output['question'] = $outputString;
    $output['correctAnswer'] = $correctAnswer;
    return $output;
}
