<?php
return [
    'db' => [
        'driver'    => 'mysql',
        'host'      => '172.21.66.142',
        'database'  => 'plates',
        'username'  => 'hils',
        'password'  => '0497',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],
    'local' => [
        'Ru'
    ],
    'home' => [
        'controller' => 'controllers\Site',
        'action' => 'index'
    ],

];
