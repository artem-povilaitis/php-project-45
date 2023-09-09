#!/usr/bin/env php
<?php

namespace BrainGames\src\Games\gcd;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function findGCD(int $num1, int $num2)
{
    if ($num2 == 0) {
        return $num1;
    }
    return findGCD($num2, $num1 % $num2);
}

function runGcd()
{
    $gameData = [];
    $gameRules = 'Find the greatest common divisor of given numbers.';
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $output = [];
        $output['question'] = $num1 . ' ' . $num2;
        $output['correctAnswer'] = findGCD($num1, $num2);

        $gameData[] = $output;
    }
    playGame($gameData, $gameRules);
}
