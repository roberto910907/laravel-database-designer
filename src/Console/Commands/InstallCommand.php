<?php
/**
 * @author Roberto Rielo <roberto910907@gmail.com>.
 *
 * @version laravel-database-designer
 */
declare(strict_types=1);

namespace DBDesigner\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

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
        $this->comment('Publishing Database Designer Service Provider...');
        $this->callSilent('vendor:publish', ['--tag' => 'db-designer-provider']);

        $this->comment('Publishing Database Designer Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'db-designer-assets']);

        $this->comment('Publishing Database Designer Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'db-designer-config']);

        $this->registerHorizonServiceProvider();

        $this->info('Horizon scaffolding installed successfully.');
    }

    /**
     * Register the Horizon service provider in the application configuration file.
     *
     * @return void
     */
    protected function registerHorizonServiceProvider()
    {
        $namespace = Str::replaceLast('\\', '', $this->laravel->getNamespace());

        $appConfig = file_get_contents(config_path('app.php'));

        if (Str::contains($appConfig, $namespace.'\\Providers\\DatabaseDesignerServiceProvider::class')) {
            return;
        }

        file_put_contents(config_path('app.php'), str_replace(
            "{$namespace}\\Providers\EventServiceProvider::class,".PHP_EOL,
            "{$namespace}\\Providers\EventServiceProvider::class,".PHP_EOL."        {$namespace}\Providers\DatabaseDesignerServiceProvider::class,".PHP_EOL,
            $appConfig
        ));

        file_put_contents(app_path('Providers/DatabaseDesignerServiceProvider.php'), str_replace(
            "namespace App\Providers;",
            "namespace {$namespace}\Providers;",
            file_get_contents(app_path('Providers/DatabaseDesignerServiceProvider.php'))
        ));
    }
}
