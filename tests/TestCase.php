<?php

namespace Kalnoy\Nestedset\Test;

use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Auth\User;
use Kalnoy\Nestedset\NestedSetServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * add the package provider
     *
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [NestedSetServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);

        config()->set('auth.providers.users.model', User::class);
        config()->set('app.key', 'base64:'.base64_encode(
            Encrypter::generateKey(config()['app.cipher'])
        ));
    }

    protected function getApplicationTimezone($app): string
    {
        return 'UTC';
    }
}
