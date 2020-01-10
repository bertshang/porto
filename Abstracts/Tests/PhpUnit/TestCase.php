<?php

namespace Bertshang\Porto\Abstracts\Tests\PhpUnit;

use Bertshang\Porto\Traits\HashIdTrait;
use Bertshang\Porto\Traits\TestCaseTrait;
use Bertshang\Porto\Traits\TestsTraits\PhpUnit\TestsAuthHelperTrait;
use Bertshang\Porto\Traits\TestsTraits\PhpUnit\TestsMockHelperTrait;
use Bertshang\Porto\Traits\TestsTraits\PhpUnit\TestsRequestHelperTrait;
use Bertshang\Porto\Traits\TestsTraits\PhpUnit\TestsResponseHelperTrait;
use Bertshang\Porto\Traits\TestsTraits\PhpUnit\TestsUploadHelperTrait;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;

/**
 * Class TestCase
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
abstract class TestCase extends LaravelTestCase
{

    use TestCaseTrait,
        TestsRequestHelperTrait,
        TestsResponseHelperTrait,
        TestsMockHelperTrait,
        TestsAuthHelperTrait,
        TestsUploadHelperTrait,
        HashIdTrait,
        RefreshDatabase;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Setup the test environment, before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Reset the test environment, after each test.
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Refresh the in-memory database.
     * Overridden refreshTestDatabase Trait
     *
     * @return void
     */
    protected function refreshInMemoryDatabase()
    {
        // migrate the database
        $this->migrateDatabase();

        // seed the database
        $this->seed();

        // Install Passport Client for Testing
        $this->setupPassportOAuth2();

        $this->app[Kernel::class]->setArtisan(null);
    }

    /**
     * Refresh a conventional test database.
     * Overridden refreshTestDatabase Trait
     *
     * @return void
     */
    protected function refreshTestDatabase()
    {
        if (! RefreshDatabaseState::$migrated) {

            $this->artisan('migrate:fresh');
            $this->seed();
            $this->setupPassportOAuth2();

            $this->app[Kernel::class]->setArtisan(null);

            RefreshDatabaseState::$migrated = true;
        }

        $this->beginDatabaseTransaction();
    }

}
