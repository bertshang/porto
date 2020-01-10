<?php

namespace Bertshang\Porto\Generator;

use Bertshang\Porto\Generator\Commands\ActionGenerator;
use Bertshang\Porto\Generator\Commands\ConfigurationGenerator;
use Bertshang\Porto\Generator\Commands\ContainerApiGenerator;
use Bertshang\Porto\Generator\Commands\ContainerGenerator;
use Bertshang\Porto\Generator\Commands\ContainerWebGenerator;
use Bertshang\Porto\Generator\Commands\ControllerGenerator;
use Bertshang\Porto\Generator\Commands\EventGenerator;
use Bertshang\Porto\Generator\Commands\EventHandlerGenerator;
use Bertshang\Porto\Generator\Commands\ExceptionGenerator;
use Bertshang\Porto\Generator\Commands\JobGenerator;
use Bertshang\Porto\Generator\Commands\MailGenerator;
use Bertshang\Porto\Generator\Commands\MigrationGenerator;
use Bertshang\Porto\Generator\Commands\ModelGenerator;
use Bertshang\Porto\Generator\Commands\NotificationGenerator;
use Bertshang\Porto\Generator\Commands\ReadmeGenerator;
use Bertshang\Porto\Generator\Commands\RepositoryGenerator;
use Bertshang\Porto\Generator\Commands\RequestGenerator;
use Bertshang\Porto\Generator\Commands\RouteGenerator;
use Bertshang\Porto\Generator\Commands\SeederGenerator;
use Bertshang\Porto\Generator\Commands\ServiceProviderGenerator;
use Bertshang\Porto\Generator\Commands\SubActionGenerator;
use Bertshang\Porto\Generator\Commands\TaskGenerator;
use Bertshang\Porto\Generator\Commands\TestFunctionalTestGenerator;
use Bertshang\Porto\Generator\Commands\TestTestCaseGenerator;
use Bertshang\Porto\Generator\Commands\TestUnitTestGenerator;
use Bertshang\Porto\Generator\Commands\TransformerGenerator;
use Bertshang\Porto\Generator\Commands\TransporterGenerator;
use Bertshang\Porto\Generator\Commands\ValueGenerator;
use Illuminate\Support\ServiceProvider;

/**
 * Class GeneratorsServiceProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class GeneratorsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // all generators ordered by name
        $this->registerGenerators([
            ActionGenerator::class,
            ConfigurationGenerator::class,
            ContainerGenerator::class,
            ContainerApiGenerator::class,
            ContainerWebGenerator::class,
            ControllerGenerator::class,
            EventGenerator::class,
            EventHandlerGenerator::class,
            ExceptionGenerator::class,
            JobGenerator::class,
            MailGenerator::class,
            MigrationGenerator::class,
            ModelGenerator::class,
            NotificationGenerator::class,
            ReadmeGenerator::class,
            RepositoryGenerator::class,
            RequestGenerator::class,
            RouteGenerator::class,
            SeederGenerator::class,
            ServiceProviderGenerator::class,
            SubActionGenerator::class,
            TestFunctionalTestGenerator::class,
            TestTestCaseGenerator::class,
            TestUnitTestGenerator::class,
            TaskGenerator::class,
            TransformerGenerator::class,
            TransporterGenerator::class,
            ValueGenerator::class,
        ]);
    }

    /**
     * Register the generators.
     * @param array $classes
     */
    private function registerGenerators(array $classes)
    {
        foreach ($classes as $class) {
            $lowerClass = strtolower($class);

            $this->app->singleton("command.porto.$lowerClass", function ($app) use ($class) {
                return $app[$class];
            });

            $this->commands("command.porto.$lowerClass");
        }
    }
}
