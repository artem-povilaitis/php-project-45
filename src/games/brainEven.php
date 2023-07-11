#!/usr/bin/env php
<?php

namespace BrainGames\games\brainEven;

use function cli\line;
use function cli\prompt;


function isEqual($number)
{
   return $number % 2 ? 'no' : 'yes';
}
function brainEven($name = 'examplename')
{
    line ('Answer "yes" if the number is even, otherwise answer "no".');
    
    $correctAnswersInRow = 0;
    while ($correctAnswersInRow < 3) {
        $number = rand(1, 100);
        line("Question: %s", $number);
        $answer = prompt('Your answer: ');
        $answer = mb_strtolower($answer);
        if (isEqual($number) === $answer) {
            line("Correct!");
            $correctAnswersInRow++;
        } else{
            line("Wrong!");
            $correctAnswersInRow = 0;
        }
    } 
    line('Congratulations, %s', $name);
}


