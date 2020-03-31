<?php

namespace McGo\TagFixer;

use Illuminate\Support\ServiceProvider;
use McGo\TagFixer\Commands\StartFixingMP3s;

class TagFixerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
           StartFixingMP3s::class
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/tagfixer.php', 'tagfixer'
        );
    }
}
