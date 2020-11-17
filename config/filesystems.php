<?php

use App\Parameter;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'base' => [
            'driver' => 'local',
            'root' => base_path()
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'endpoint' => env('AWS_URL'),
        ],

        'sftp-server' => [
            'driver' => env('FLSYS_DRIVER', 'sftp'),
            'host' => env('FLSYS_HOST', 'tsf.mdd.co.id'),
            'username' => env('FLSYS_USERNAME', 'vmminuman'),
            'password' => env('FLSYS_PASSWORD', 'vmm1num4n123'),
            'port' => env('FLSYS_PORT', 22),
            'root' => env('FLSYS_ROOT', ''),

            // Settings for SSH key based authentication...
            // 'privateKey' => '/path/to/privateKey',
            // 'password' => 'encryption-password',

            // Optional SFTP Settings...
            // 'timeout' => 30,
        ],

        // 'sftp-aquatik' => [
        //     'driver' => 'sftp',
        //     'host' => Parameter::host(),
        //     'username' => Parameter::username(),
        //     'password' => Parameter::password(),
        //     'port' => Parameter::port(),
        //     'root' => Parameter::root(),

            // Settings for SSH key based authentication...
            // 'privateKey' => '/path/to/privateKey',
            // 'password' => 'encryption-password',

            // Optional SFTP Settings...
            // 'timeout' => 30,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('upload/product') => base_path('upload/product'),
        public_path('upload/settlement') => base_path('upload/settlement'),
        public_path('upload/settlement_bca') => base_path('upload/settlement_bca'),
        public_path('upload/settlement_bni') => base_path('upload/settlement_bni'),
        public_path('upload/settlement_dki') => base_path('upload/settlement_dki'),
        public_path('upload/settlement_brizzi') => base_path('upload/settlement_brizzi'),
    ],

];
