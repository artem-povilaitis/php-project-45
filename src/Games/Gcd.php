#!/usr/bin/env php
<?php

namespace BrainGames\Games\gcd;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function gcd(int $x, int $y)
{
    if ($y == 0) {
        return $x;
    }
    return gcd($y, $x % $y);
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
        $output['correctAnswer'] = gcd($num1, $num2);

        $gameData[$i] = $output;
    }
    playGame($gameData, $gameRules);
}
