<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Escort;
use Carbon\Carbon;

class DeactivateExpiredEscorts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'escorts:deactivate-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate escorts whose active_until date has passed.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $now = Carbon::now();

        // Find all escorts where active_until is in the past and update their status to inactive
        Escort::where('status', true)
              ->where('active_until', '<', $now)
              ->update(['status' => false]);

        $this->info('Expired escorts deactivated successfully.');
    }
}
