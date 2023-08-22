#!/usr/bin/env php
<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\games\Calc\runCalcRound;
// include '.src/games/Calc.php';

const ROUNDS_COUNT = 1;

function sayHello()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function sayRules($gameRules)
{
    line($gameRules);
}

function sayQuestion($question)
{
    line("Question: %s", $question);
}

function yesOrNo($bool)
{

    //$word = mb_strtolower($word);
    if ($bool === true) {
        return 'yes';
    }
    if ($bool === false) {
        return 'no';
    }
    return 'null';

    return null;
}


function answerIsWrong($wrongAnswer, $correctAnswer, $name)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'", $wrongAnswer, $correctAnswer);
    line(" Let's try again, %s!", $name);
}

function answerIsCorrect()
{
    line("Correct!");
}

function printYourAnswer()
{
    return prompt('Your answer');
}

function win($name)
{
    line('Congratulations, %s', $name);
}

function beginGame($gameRules)
{
    line('test118');
    $name = sayHello();
    sayRules($gameRules);
    return $name;
}

function playGame(array $gameData, string $gameRules)
{
    $name = beginGame($gameRules);

    foreach ($gameData as $roundData) {
        $roundQuestion = $roundData['question'];
        $correctAnswer = $roundData['correctAnswer'];
        sayQuestion($roundQuestion);
        $userAnswer = printYourAnswer();
        if ($userAnswer != $correctAnswer) {
            answerIsWrong($userAnswer, $correctAnswer, $name);
            return null;            
        }
        answerIsCorrect();
    }
    win($name);
}