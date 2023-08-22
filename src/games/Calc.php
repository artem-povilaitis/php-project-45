#!/usr/bin/env php
<?php

namespace BrainGames\games\Calc;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function calc($a, $b, $arithmeticSymbol)
{
    if ($arithmeticSymbol === '+') {
        return $a + $b;
    }
    if ($arithmeticSymbol === '-') {
        return $a - $b;
    }
    if ($arithmeticSymbol === '*') {
        return $a * $b;
    }
}

function createCalcRound()
{

    $arithmeticSymbols = ['+', '-', '*'];
    $a = rand(1, 100);
    $b = rand(1, 100);
    $arithmeticSymbol = $arithmeticSymbols[array_rand($arithmeticSymbols)];
    $output = [];
    $output['question'] = $a . ' ' . $arithmeticSymbol . ' ' . $b;
    $output['correctAnswer'] = calc($a, $b, $arithmeticSymbol);
    return $output;
}

function runCalcGame()
{
    $gameData = [];
    $gameRules = 'What is the result of the expression?';
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[$i] = createCalcRound();
    }
    playGame($gameData, $gameRules);
}
