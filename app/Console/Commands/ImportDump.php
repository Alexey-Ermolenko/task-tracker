<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ImportDump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make import dump database Command';

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
        $this->info('This is a custom command!');

        $dumpPath = base_path('dump');

        if (!File::isDirectory($dumpPath)) {
            $this->error('Dump folder not found');
            return Command::FAILURE;
        }

        $files = File::files($dumpPath);

        if (empty($files)) {
            $this->info('No dump files found');
            return Command::FAILURE;
        }

        foreach ($files as $file) {
            $this->info("Importing: {$file->getFilename()}");

            $sql = File::get($file->getPathname());

            try {
                DB::unprepared($sql);
                $this->info('Import successful');
            } catch (\Exception $e) {
                $this->error('Import failed: ' . $e->getMessage());
            }
        }

        $this->info('All dumps imported');

        return Command::SUCCESS;
    }
}
