#!/usr/bin/env php
<?php

namespace BrainGames\games\Prime;

use const BrainGames\Engine\ROUNDS_COUNT;

use function BrainGames\Engine\{yesOrNo, playGame};

function createPrimeNumbers()
{
    $primes = [2, 3, 4, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    return $primes;
}


function runPrimeGame()
{
    $gameData = [];
    $gameRules = 'Answer "yes" if the number is prime, otherwise answer "no".';
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[$i] = createPrimeRound();
    }
    playGame($gameData, $gameRules);
}

function createPrimeRound()
{

    $number = rand(1, 100);
    $output = [];
    $primes = createPrimeNumbers();

    $output['question'] = $number;
    $output['correctAnswer'] = yesOrNo(in_array($number, $primes));
    return $output;
}


function runPrime($name)
{
    line('Answer "yes" if the number is prime, otherwise answer "no".');

    $primes = createPrimeNumbers();
    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $number = rand(1, 100);
        $correctAnswer = (in_array($number, $primes));
        line("Question: %s", $number);
        $userAnswer = printYourAnswer();

        if ($correctAnswer === yesOrNo($userAnswer)) {
            answerIsCorrect();
            $correctAnswers++;
        } else {
            $correctAnswer = in_array($number, $primes) ? 'yes' : 'no';
            answerIsWrong($userAnswer, $correctAnswer, $name);
            return false;
        }
    }
    win($name);
}
