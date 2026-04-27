<?php

use Illuminate\Support\Str;

function pipe($str)
{
    $commands = explode("|", $str);

    // first item is input
    $value = trim(array_shift($commands));

    foreach ($commands as $command) {

        $command = trim($command);

        // $value = 'Str::' . $command . '($value)';
        $value = call_user_func([Str::class, $command], $value);
    }

    return $value;
}