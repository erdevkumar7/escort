<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],



    'guards' => [        
        'agency' => [
            'driver' => 'session',
            'provider' => 'agencies',
        ],
        'escort' => [
            'driver' => 'session',
            'provider' => 'escorts',
        ],
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'contributor' => [
            'driver' => 'session',
            'provider' => 'contributors',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],


    'providers' => [
        'agencies' => [
            'driver' => 'eloquent',
            'model' => App\Models\Agency::class,
        ],
        'escorts' => [
            'driver' => 'eloquent',
            'model' => App\Models\Escort::class,
        ],
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'contributors' => [
            'driver' => 'eloquent',
            'model' => App\Models\Contributor::class,
        ],
    ],



    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'escorts' => [
            'provider' => 'escorts',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'agencies' => [
            'provider' => 'agencies',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],



    'password_timeout' => 10800,

];
