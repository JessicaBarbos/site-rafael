<?php

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeders'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'dev',
            'production' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'production_db',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'dev' => [
                'adapter' => 'pgsql',
                'host' => 'localhost',
                'name' => 'database_name',
                'user' => 'user',
                'pass' => 'password',
                'port' => 'port',
                'charset' => 'utf8',
            ],

        ],
        'version_order' => 'creation'
    ];
