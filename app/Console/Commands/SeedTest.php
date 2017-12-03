<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class SeedTest
 *
 * @package Console\Commands
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class SeedTest extends Command
{

    protected $signature = 'db:seed-test';

    protected $description = 'Seed database with test data';

    public function handle()
    {
        $this->call('db:seed', [ '--class' => 'TestSeeder' ]);

    }
}