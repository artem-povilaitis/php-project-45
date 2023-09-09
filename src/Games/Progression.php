#!/usr/bin/env php
<?php

namespace BrainGames\src\Games\Progression;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function createProgression()
{
    $step = rand(1, 15);
    $currentElement = rand(1, 50);
    $progressionSize = rand(5, 11);
    $progression = [];
    for ($j = 0; $j < $progressionSize; $j += 1) {
        $progression[] = $currentElement;
        $currentElement += $step;
    }
    return $progression;
}
function runProgression()
{
    $gameData = [];
    $gameRules = 'What number is missing in the progression?';
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $progression = createProgression();

        $keyOfElement = array_rand($progression);
        $correctAnswer = $progression[$keyOfElement];
        $progression[$keyOfElement] = '..';
        $outputString = implode(' ', $progression);

        $output = [];

        $output['question'] = $outputString;
        $output['correctAnswer'] = $correctAnswer;

        $gameData[] = $output;
    }
    playGame($gameData, $gameRules);
}
