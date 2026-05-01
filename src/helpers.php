<?php

use Illuminate\Support\Str;

function pipe($input, $pipes)
{
    $commands = explode("|", $pipes);

    $result = trim($input);

    foreach ($commands as $command) {
        $command = trim($command);

        if (function_exists($command)) {
            $result = $command($result);

            continue;
        }

        [$command, $limit] = explode(":", $command) + [1 => null];

        if ($limit !== null) {
            $limit = (int) $limit;

            $result = call_user_func([Str::class, $command], $result, $limit);
        }

        $result = call_user_func([Str::class, $command], $result);
    }

    return $result;
}