<?php

$env = getenv('APPLICATION_ENV');

if ($env == 'live') {

    return new \Phalcon\Config(array(

        'live'       => true,
        'layout'     => 'destruti',
        'website'    => 'PUT YOUR SERVER',

        'database' => array(
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '123DESTRUTI',
            'name'     => 'destruti_phalcon_basic',
            'options'  => array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
                PDO::ATTR_CASE => PDO::CASE_LOWER
            )
        ),

    ));

}
else
if ($env == 'development') {

    return new \Phalcon\Config(array(

        'live'       => false,
        'layout'     => 'jair',
        'website'    => 'http://jair.mlab.dev/',
        'api_url'    => 'http://jair.mlab.dev/',

        'keys' => array(
            'J0gO_d@_1@m@_50' => 'juntospelascriancas'
        ),

        'database' => array(
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '123DESTRUTI',
            'name'     => 'destruti_phalcon_basic',
            'options'  => array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
                PDO::ATTR_CASE => PDO::CASE_LOWER
            )
        ),

    ));

}