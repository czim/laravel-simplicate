<?php

return [

    'api' => [

        // The base URL of the Simplicate API, with optional {DOMAIN} placeholder.
        'url'    => env('SIMPLICATE_API_URL', 'https://{DOMAIN}.simplicate.nl/api/v2/'),
        'domain' => env('SIMPLICATE_DOMAIN'),
        'key'    => env('SIMPLICATE_API_KEY'),
        'secret' => env('SIMPLICATE_API_SECRET'),

    ],

];
