<?php

namespace BrainGames\src\Cli;

use function cli\line;
use function cli\prompt;

function sayHelloUser()
{
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
}
