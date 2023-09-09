#!/usr/bin/env php
<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function runEven()
{
    $gameData = [];
    $gameRules = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $number = rand(1, 100);

        $output = [];
        $output['question'] = $number;
        $output['correctAnswer'] = isEven($number) ? 'yes' : 'no';

        $gameData[] = $output;
    }
    playGame($gameData, $gameRules);
}
