#!/usr/bin/env php
<?php

namespace BrainGames\games\Even;

use function BrainGames\Engine\{yesOrNo, playGame};

use const BrainGames\Engine\ROUNDS_COUNT;

function isEven(int $number)
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}


function createEvenRound()
{
    $number = rand(1, 100);

    $output = [];
    $output['question'] = $number;
    $output['correctAnswer'] = yesOrNo(isEven($number));
    return $output;
}

function runEvenGame()
{
    $gameData = [];
    $gameRules = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[$i] = createEvenRound();
    }
    playGame($gameData, $gameRules);
}
