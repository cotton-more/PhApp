<?php

return [
    // Database configuration
    'database' => [
        'host'     => 'hostname',
        'username' => 'db_username',
        'password' => 'db_password',
        'dbname'   => 'dbname',
    ],

    // Application configuration
    'application' => [
        'viewsDir'       => realpath(__DIR__ . '/../../src/resources/views').'/',
        'cacheDir'       => realpath(__DIR__ . '/../storage/cache/data').'/',
        'logsDir'        => realpath(__DIR__ . '/../storage/logs').'/',
        'baseUri'        => '/',
    ],

    // The Volt Engine configuration
    'volt' => [
        'cacheDir'          => realpath(__DIR__.'/../../storage/cache/volt').'/',
        'compiledSeparator' => '_',
    ],
];