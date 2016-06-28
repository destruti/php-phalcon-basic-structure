<?php

$env = getenv('APPLICATION_ENV');

if ($env == 'live') {

    return new \Phalcon\Config(array(

        'live'       => true,
        'layout'     => 'destruti',
        'website'    => 'PUT YOUR SERVER',
        'api_url'    => 'PUT YOUR SERVER',

        'database' => array(
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
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
        'layout'     => 'destruti',
        'website'    => 'http://phalcon-destruti.github.dev/',
        'api_url'    => 'http://phalcon-destruti.github.dev/',

        'database' => array(
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'name'     => 'destruti_phalcon_basic',
            'options'  => array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
                PDO::ATTR_CASE => PDO::CASE_LOWER
            )
        ),

    ));

}