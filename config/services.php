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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
//url().
   'facebook' => [
      'client_id'     => env('CONF_facebookapp'),
      'client_secret' => env('CONF_facebookappsecret'),
      'redirect'      => url('/auth/social/facebook/callback'),
   ],
    'twitter' => [
      'client_id'     => env('CONF_twitterapp'),
      'client_secret' => env('CONF_twitterappsecret'),
      'redirect'      => url('/auth/social/twitter/callback'),
   ],
    'google' => [
      'client_id'     => env('CONF_googleapp'),
      'client_secret' => env('CONF_googleappsecret'),
      'redirect'      => url('/auth/social/google/callback'),
   ],
    'vkontakte' => [
      'client_id'     => env('CONF_VKONTAKTE_KEY'),
      'client_secret' => env('CONF_VKONTAKTE_SECRET'),
      'redirect'      => url('/auth/social/vkontakte/callback'),
   ],
];


