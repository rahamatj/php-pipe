<?php

namespace Raham\PhpPipe;

use Illuminate\Support\ServiceProvider;

class PhpPipeServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind things into container
    }

    public function boot()
    {
        require_once __DIR__ . '/helpers.php';
    }
}