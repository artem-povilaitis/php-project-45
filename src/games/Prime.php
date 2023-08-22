#!/usr/bin/env php
<?php

namespace BrainGames\games\Prime;

use function BrainGames\Engine\{yesOrNo, playGame};

use const BrainGames\Engine\ROUNDS_COUNT;

function createPrimeNumbers()
{
    $primes = [2, 3, 4, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    return $primes;
}


function runPrimeGame()
{
    $gameData = [];
    $gameRules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[$i] = createPrimeRound();
    }
    playGame($gameData, $gameRules);
}

function createPrimeRound()
{

    $number = rand(1, 100);
    $output = [];
    $primes = createPrimeNumbers();

    $output['question'] = $number;
    $output['correctAnswer'] = yesOrNo(in_array($number, $primes));
    return $output;
}
