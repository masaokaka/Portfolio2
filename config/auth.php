<?php

return [

    /*Authentifivcation default*/
    'defaults' => [
        'guard' => 'user',
        'passwords' => 'users',
    ],

    /*Authentifivcation guards*/
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'jinji' => [
            'driver' => 'session',
            'provider' => 'jinjis',
        ],


        
    ],

    /*User providers*/
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],

        'jinjis' => [
            'driver' => 'eloquent',
            'model' => App\Jinji::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*Resetting password*/
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'jinjis' => [
            'provider' => 'jinjis',
            'table' => 'password_resets',
            'expire' => 60,
        ],

    ],

];
