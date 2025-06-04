<?php

namespace Tauseedzaman\LaraLanding\Commands;

use Illuminate\Console\Command;

class LaraLandingCommand extends Command
{
    public $signature = 'lara-landing';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
