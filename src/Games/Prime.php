#!/usr/bin/env php
<?php

namespace BrainGames\src\Games\Prime;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isPrime(int $number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $number; $i += 1) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

function runPrime()
{
    $gameData = [];
    $gameRules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $number = rand(1, 100);
        $output = [];

        $output['question'] = $number;
        $output['correctAnswer'] = isPrime($number) ? 'yes' : 'no';
        $gameData[] = $output;
    }
    playGame($gameData, $gameRules);
}
