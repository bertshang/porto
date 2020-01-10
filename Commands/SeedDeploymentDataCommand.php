<?php

namespace Bertshang\Porto\Commands;

use App\Ship\Parents\Commands\ConsoleCommand;

/**
 * Class SeedDeploymentDataCommand
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class SeedDeploymentDataCommand extends ConsoleCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "porto:seed-deploy";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Seed data for initial deployment.";

    /**
     * SeedTestingDataCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle the command
     */
    public function handle()
    {
        $this->call('db:seed', [
            '--class' => 'App\Ship\Seeders\SeedDeploymentData'
        ]);

        $this->info('Deployment Data Seeded Successfully.');
    }

}