<?php
return array(
    // set your paypal credential
    'client_id' => 'ATxaBJdFEgdBIMV3n4r3lUQQCfGcH5C7kj2clr60yUbebftvGeEYAi35POtXfG7j4HY-Ku2-5xfK4X5o',
    'secret' => 'EGhOZ_jRbCNEJg2c7kfSBNJgDfXiOds8bAcVgCeIK7_77xhJCa7OJEUOoZOIbUBBVDirtHijvvpFg-9B',
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
        'http.ConnectionTimeOut' => 10000,
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


