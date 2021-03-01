<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '97020831901-5nftb9cs6sf4po3occlri71c7n0fi2ps.apps.googleusercontent.com',
        'client_secret' => 'fGq4gflrSZFnzcCwYwFDsnkO',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback'
    ],

    'facebook' => [
        'client_id' => '460503805142137',
        'client_secret' => '8635212ba85765685ea57c66cca6d0c3',
        'redirect' => 'http://localhost:8000/login/facebook/callback'
    ],

    'twitter' => [
        'client_id' => 'ut00IxvwWiSkFwoLD31Abh9Vu',
        'client_secret' => 'A54HMNBaczqhjMYdCTe3zdUQHZOXE78tQGqW9jhwzRAILWLkTy',
        'redirect' => 'http://127.0.0.1:8000/login/twitter/callback'
    ]
];


