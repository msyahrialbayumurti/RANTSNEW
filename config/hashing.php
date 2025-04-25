<?php

return [

'default' => 'bcrypt',

'hashes' => [
    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],
],

];