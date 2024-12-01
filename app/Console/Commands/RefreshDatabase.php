<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->warn('WARNING: You are about to delete the database! This action cannot be undone.');
        $finalConfirmation = $this->ask('Please type "DELETE" to confirm your action');
        if ($finalConfirmation === 'DELETE') {
            $tables = DB::select('SHOW TABLES');
            $this->info("Dropping all tables...");
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

            foreach ($tables as $table) {
                $tableName = array_values((array)$table)[0];
                DB::statement("DROP TABLE IF EXISTS `$tableName`;");
            }
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
            $this->info("All tables have been dropped.");
            $this->info("Migrating...");
            Artisan::call('migrate');
            $this->info("Migrated.");
            $this->info("Seeding data...");
            Artisan::call('db:seed');
            $this->info("Done.");
        }
        $this->info('Action aborted.');
    }
}
