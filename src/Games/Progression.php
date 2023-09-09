#!/usr/bin/env php
<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function runProgression()
{
    $gameData = [];
    $gameRules = 'What number is missing in the progression?';
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $step = rand(1, 15);
        $currentElement = rand(1, 50);
        $progressionSize = rand(5, 11);
        $progression = [];
        for ($j = 0; $j < $progressionSize; $j += 1) {
            $progression[$j] = $currentElement;
            $currentElement += $progressionSize;
        }

        $outputString = implode(' ', $progression);

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
