#!/usr/bin/env php
<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function sayHello()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function sayRules(string $gameRules)
{
    line($gameRules);
}

function sayQuestion(string $question)
{
    line("Question: %s", $question);
}

function yesOrNo(bool $bool)
{
    if ($bool === true) {
        return 'yes';
    }
    return 'no';
}

function answerIsWrong(string $wrongAnswer, string $correctAnswer, string $name)
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

function win(string $name)
{
    line('Congratulations, %s!', $name);
}

function beginGame(string $gameRules)
{
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
