<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default CORS Settings
    |--------------------------------------------------------------------------
    |
    | This configuration is used to set the default settings for CORS
    | support. You may change these settings as needed for your application.
    |
    */

    'supports_credentials' => true,

    'allowed_origins' => ['http://localhost:3000'],  // Thêm địa chỉ frontend của bạn

    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'Accept'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],  // Các phương thức HTTP cho phép

    'exposed_headers' => [],
    'max_age' => 0,
    'hosts' => [],
];
