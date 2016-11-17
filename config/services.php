<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '121039975042140',
        'client_secret' => 'c8b92808e3b9f7b38cbde6d984d4e193',
        'redirect' => 'http://laravel.loc/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '761734949653-t6hstqr648fv0iu8o98rdju3nm1dd7pu.apps.googleusercontent.com',

        'client_secret' => 'MyEw61fZmn2pyaRNI_3i8uCO',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
