<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SevDesk API Token
    |--------------------------------------------------------------------------
    |
    | This is your SevDesk API token. You can find it in your SevDesk account
    | under Settings > User > API Token. The token is a 32 character
    | hexadecimal string.
    |
    */
    'api_token' => env('SEVDESK_API_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | API Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the SevDesk API. You shouldn't need to change this
    | unless SevDesk changes their API endpoint.
    |
    */
    'base_url' => env('SEVDESK_BASE_URL', 'https://my.sevdesk.de/api/v1'),

    /*
    |--------------------------------------------------------------------------
    | Default Timeout
    |--------------------------------------------------------------------------
    |
    | The default timeout for API requests in seconds.
    |
    */
    'timeout' => env('SEVDESK_TIMEOUT', 30),

    /*
    |--------------------------------------------------------------------------
    | Retry Configuration
    |--------------------------------------------------------------------------
    |
    | Configure retry behavior for failed requests.
    |
    */
    'retry' => [
        'times' => env('SEVDESK_RETRY_TIMES', 3),
        'sleep' => env('SEVDESK_RETRY_SLEEP', 1000), // milliseconds
    ],
];