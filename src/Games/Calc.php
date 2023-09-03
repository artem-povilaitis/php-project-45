#!/usr/bin/env php
<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function runCalc()
{
    $gameData = [];
    $gameRules = 'What is the result of the expression?';
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $arithmeticSymbols = ['+', '-', '*'];

        $a = rand(1, 100);
        $b = rand(1, 100);
        $arithmeticSymbol = $arithmeticSymbols[array_rand($arithmeticSymbols)];

        switch ($arithmeticSymbol) {
            case '+':
                $correctAnswer = $a + $b;
                break;
            case '-':
                $correctAnswer = $a - $b;
                break;
            case '*':
                $correctAnswer = $a * $b;
                break;
        }

        $output = [];
        $output['question'] = $a . ' ' . $arithmeticSymbol . ' ' . $b;
        $output['correctAnswer'] = $correctAnswer;


        $gameData[$i] = $output;
    }

    playGame($gameData, $gameRules);
}
