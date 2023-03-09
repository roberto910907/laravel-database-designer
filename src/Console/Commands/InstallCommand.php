<?php
/**
 * @author Roberto Rielo <roberto910907@gmail.com>.
 *
 * @package laravel-database-designer
 */
declare(strict_types=1);

namespace DBDesigner\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db-designer:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the Database Designer resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->comment('Publishing Database Designer Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'db-designer-assets']);

        $this->comment('Publishing Database Designer Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'db-designer-config']);

        $this->info('Database Designer scaffolding installed successfully.');
    }
}
