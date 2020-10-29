<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'region' => 'eu-west-1',
        'version' => 'latest',
        'credentials' => array(
            'key' => env('SES_KEY'),
            'secret' => env('SES_SECRET'),
        )
    ],

    'stripe' => [
        'model'  => 'User',
        'secret' => '',
    ],

];