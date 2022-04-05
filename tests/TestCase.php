<?php


namespace PrageethPeiris\SiteAllocator\Tests;


use Illuminate\Support\Facades\Config;
use PrageethPeiris\SiteAllocator\SiteAllocatorServiceProvider;

class TestCase extends  \Orchestra\Testbench\TestCase
{


    public function setUp(): void
    {
        parent::setUp();

        //mock user class
        Config::set('site-allocator.user',User::class);
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            SiteAllocatorServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
        include_once __DIR__ . '/../database/migrations/create_users_table.php.stub';

        // run the up() method (perform the migration)
        (new \CreateUsersTable())->up();
    }





}