<?php

$router = new \Phalcon\Mvc\Router();

$router->add('/', array(
    'module'     => 'home',
    'namespace'  => 'Meg\Home\Controllers\\',
    'controller' => 'home',
    'action'     => 'index'
));

$router->add('/getTransfer', array(
    'module'     => 'bigdata',
    'namespace'  => 'Meg\Bigdata\Controllers\\',
    'controller' => 'bigdata',
    'action'     => 'getTransfer'
));

return $router;