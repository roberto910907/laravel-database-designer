<?php
/**
 * @author Roberto Rielo <roberto910907@gmail.com>.
 *
 * @package laravel-database-designer
 */
declare(strict_types=1);

namespace DBDesigner\Console\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db-designer:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the Database Designer resources';

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'db-designer-assets',
            '--force' => true,
        ]);
    }
}
