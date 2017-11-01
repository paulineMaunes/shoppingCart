<?php

return array(
    /** set your paypal credential **/
    'client_id' =>'paypal client_id',
    'secret' => 'paypal secret ID',
    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);

return [
    'mode' => 'sandbox',        // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username' => '',       // Api Username
        'password' => '',       // Api Password
        'secret' => '',         // This refers to api signature
        'certificate' => '',    // Link to paypals cert file, storage_path('cert_key_pem.txt')
    ],
    'live' => [
        'username' => '',       // Api Username
        'password' => '',       // Api Password
        'secret' => '',         // This refers to api signature
        'certificate' => '',    // Link to paypals cert file, storage_path('cert_key_pem.txt')
    ],
    'payment_action' => 'Sale', // Can Only Be 'Sale', 'Authorization', 'Order'
    'currency' => 'USD',
    'notify_url' => '',         // Change this accordingly for your application.
];