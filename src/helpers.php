<?php

use Illuminate\Support\Str;

function pipe($input, $pipes)
{
    $input = trim($input);

    $commands = explode("|", $pipes);

    foreach ($commands as $command) {
        $command = trim($command);
        $result = call_user_func([Str::class, $command], $result);
    }

    return $result;
}