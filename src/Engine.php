#!/usr/bin/env php
<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function playGame(array $gameData, string $gameRules)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($gameRules);

    foreach ($gameData as ['question' => $roundQuestion, 'correctAnswer' => $correctAnswer]) {
        line("Question: %s", $roundQuestion);

        $userAnswer = prompt('Your answer');

        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $correctAnswer);
            line(" Let's try again, %s!", $name);
            return;
        }
        line("Correct!");
    }
    line('Congratulations, %s!', $name);
}
