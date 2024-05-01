<?php

// return [

//     /*
//     |--------------------------------------------------------------------------
//     | Cross-Origin Resource Sharing (CORS) Configuration
//     |--------------------------------------------------------------------------
//     |
//     | Here you may configure your settings for cross-origin resource sharing
//     | or "CORS". This determines what cross-origin operations may execute
//     | in web browsers. You are free to adjust these settings as needed.
//     |
//     | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
//     |
//     */

//     'paths' => ['*'],

//     'allowed_methods' => ['*'],

//     'allowed_origins' => [env("FRONTEND_URL", "http://localhost:8000")],

//     'allowed_origins_patterns' => [],

//     'allowed_headers' => ['*'],

//     'exposed_headers' => [],

//     'max_age' => 0,

//     'supports_credentials' => false,

// ];


return [
    'paths' => ['api/*'], // Ustawienie ścieżek, dla których będzie stosowana polityka CORS
    'allowed_methods' => ['*'], // Zezwól na wszystkie metody HTTP (GET, POST, itp.)
    'allowed_origins' => ['http://localhost:3000'], // Dodaj adres URL Twojej aplikacji React
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Zezwól na wszystkie nagłówki
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
