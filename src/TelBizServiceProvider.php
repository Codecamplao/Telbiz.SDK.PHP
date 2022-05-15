<?php

namespace CodeCampLAO\TelBiz;

use Illuminate\Support\ServiceProvider;

/**
 * @author Khamphai
 */
class TelBizServiceProvider extends ServiceProvider
{

    public function boot() {
        $this->publishes([
            __DIR__.'/../config/telbiz.php' => config_path('telbiz.php'),
        ]);
    }

    public function register() {
        $this->mergeConfigFrom(
            __DIR__.'/../config/telbiz.php', 'telbiz'
        );
    }
}
