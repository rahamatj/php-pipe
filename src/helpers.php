<?php

use Illuminate\Support\Str;

function pipe($input, ...$args)
{
    $result = trim($input);

    foreach ($args as $key => $value) {
        if (is_int($key)) {
            // positional argument, treat as string command
            $commands = explode("|", $value);
            foreach ($commands as $command) {
                $command = trim($command);
                [$method, $param] = explode(":", $command) + [1 => null];
                if (function_exists($method)) {
                    if ($param !== null) {
                        $result = $method($result, $param);
                    } else {
                        $result = $method($result);
                    }
                } else {
                    if ($param !== null) {
                        $param = (int) $param;
                        $result = call_user_func([Str::class, $method], $result, $param);
                    } else {
                        $result = call_user_func([Str::class, $method], $result);
                    }
                }
            }
        } else {
            // named argument, $key is method, $value is param
            if (function_exists($key)) {
                $result = $key($result, $value);
            } else {
                $result = call_user_func([Str::class, $key], $result, (int) $value);
            }
        }
    }

    return $result;
}