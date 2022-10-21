<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'client_id' => 'AVN9YXtCXlqvBNqkgrT-eCowNbX5K5UUe09wjogZBC7AF-uINR6epF2IUOshpJWLycktiqsiffIElDsM',
    'secret' => 'ECC25DgpLIYcoZBKYim3Glm5CfjZssRX76_IKffqyh-5scuWdYTOQ6Q6rHSurZWjBu9_mgLGkkgsLI2d',
    'currency'       => env('PAYPAL_CURRENCY', 'EUR'),
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
