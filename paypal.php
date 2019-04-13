<?php
    return [
        'client_id' => env('PAYPAL_CLIENT_ID', ''),
        'scret' => env('PAYPAL_SECRET', ''),
        'settings' => array(
            'mode' => env('PAYPAL_MODE', ''),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => false,
            'log.FileName' => storage() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR',
        ),
    ];