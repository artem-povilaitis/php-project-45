#!/usr/bin/env php
<?php

namespace BrainGames\src\Games\Calc;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function calculate(int $num1, int $num2, string $arithmeticSymbol)
{
    switch ($arithmeticSymbol) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            return null;
    }
}


function runCalc()
{
    $gameData = [];
    $gameRules = 'What is the result of the expression?';
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $arithmeticSymbols = ['+', '-', '*'];

        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $arithmeticSymbol = $arithmeticSymbols[array_rand($arithmeticSymbols)];

        $correctAnswer = calculate($num1, $num2, $arithmeticSymbol);
        $output = [];
        $output['question'] = "$num1 $arithmeticSymbol $num2";
        $output['correctAnswer'] = $correctAnswer;


        $gameData[] = $output;
    }

    playGame($gameData, $gameRules);
}
