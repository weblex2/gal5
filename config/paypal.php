<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

/* Live
client_id AbvjBRMGD1tetUIzZJIRKV5qRzvMdo5vmO0DI6_OVn4VGjy3E8UKWt2_hWXzXLJ070dO_oOuUrd6Ccd9
secret EKRIu_a5bzPRi2NAlpDNCwNx1Lf-Wm42RYLPPlsZD_SjTF6PLhljAUewYVr5Cq1krTN0x_R55kl8bchI
*/
return [
    'client_id' => 'AVN9YXtCXlqvBNqkgrT-eCowNbX5K5UUe09wjogZBC7AF-uINR6epF2IUOshpJWLycktiqsiffIElDsM',
    'secret' => 'ECC25DgpLIYcoZBKYim3Glm5CfjZssRX76_IKffqyh-5scuWdYTOQ6Q6rHSurZWjBu9_mgLGkkgsLI2d',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
