<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\DowngradeLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Worksome\CodingStyle\WorksomeRectorConfig;

return static function (RectorConfig $rectorConfig): void {
    // WorksomeRectorConfig::setup($rectorConfig);

    $rectorConfig->phpVersion(PhpVersion::PHP_81);
    $rectorConfig->paths([
        __DIR__ . '/config',
        __DIR__ . '/src',
        // __DIR__ . '/tests',
    ]);

    // Define extra rule sets to be applied
    $rectorConfig->sets([
        // SetList::DEAD_CODE,
        DowngradeLevelSetList::DOWN_TO_PHP_81,
        // LevelSetList::UP_TO_PHP_81,
    ]);

    // Register extra a single rules
    // $rectorConfig->rule(ClassOnObjectRector::class);
};
