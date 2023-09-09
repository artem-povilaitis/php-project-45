#!/usr/bin/env php
<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function runCalc()
{
    $gameData = [];
    $gameRules = 'What is the result of the expression?';
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $arithmeticSymbols = ['+', '-', '*'];

        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $arithmeticSymbol = $arithmeticSymbols[array_rand($arithmeticSymbols)];

        switch ($arithmeticSymbol) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
        }

        $output = [];
        $output['question'] = "$num1 $arithmeticSymbol $num2";
        $output['correctAnswer'] = $correctAnswer;


        $gameData[$i] = $output;
    }

    playGame($gameData, $gameRules);
}
