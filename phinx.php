<?php

return [
    'paths' => [
        'migrations' => 'database/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => 'db',
            'name' => 'control_panel',
            'user' => 'user',
            'pass' => 'secret',
            'port' => '3306',
            'charset' => 'utf8mb4',
        ],
    ],
];

?>