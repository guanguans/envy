<?php

use Worksome\Envy\Contracts\Finder;
use Worksome\Envy\Support\LaravelFinder;

it('can be resolved correctly', function () {
    expect($this->app->make(Finder::class))->toBeInstanceOf(LaravelFinder::class);
})->group('useRealFinder');

it('can return all configured config files', function () {
    $finder = new LaravelFinder(
        $this->app,
        [
            testAppPath('config'),
            str_replace('/', DIRECTORY_SEPARATOR, __DIR__ . '/../../../config/envy.php'),
        ],
        []
    );

    $paths = $finder->configFilePaths();
    sort($paths);

    expect($paths)->toBe([
        testAppPath('config/app.php'),
        testAppPath('config/envy.php'),
        testAppPath('config/nested/config.php'),
        str_replace('/', DIRECTORY_SEPARATOR, __DIR__ . '/../../../config/envy.php'),
    ]);
});

it('can return all configured environment files', function () {
    $finder = new LaravelFinder(
        $this->app,
        [],
        [
            testAppPath('.env.example'),
            testAppPath('.env'),
        ]
    );

    expect($finder->environmentFilePaths())->toBe([
        testAppPath('.env.example'),
        testAppPath('.env'),
    ]);
});

it('can return the envy config file', function () {
    $finder = new LaravelFinder($this->app, [], []);

    expect($finder->envyConfigFile())->toBeNull();
});
