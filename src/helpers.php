<?php

use Illuminate\Support\Str;

function pipe($input, $pipes)
{
    $commands = explode("|", $pipes);

    $result = trim($input);

    foreach ($commands as $command) {
        $command = trim($command);

        $result = call_user_func([Str::class, $command], $result);
    }

    return $result;
}