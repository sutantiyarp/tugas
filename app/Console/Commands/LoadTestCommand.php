<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class LoadTestCommand extends Command
{
    protected $signature = 'loadtest:start';
    protected $description = 'Perform a load test by sending multiple requests';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Starting load test...');

        // Simulate sending requests concurrently
        $responses = [];
        for ($i = 0; $i < 1000; $i++) {  // Simulate 1000 requests
            $responses[] = Http::get('http://127.0.0.1:8000/login');
        }

        $this->info('Load test completed');
    }
}