<?php

/**
 * Phalcon Basic Structure
 * CTO, Developer, Architect / Eduardo Destruti
 * eduardo.destruti@maquinadobem.com
 */

ini_set('display_errors', 1);

require "../vendor/autoload.php";

try {

    $loader = new \Phalcon\Loader();
    $loader->registerNamespaces(array('Meg\Libs'=> __DIR__.'/../common/library/'));
    $loader->register();

    $di = new \Phalcon\DI\FactoryDefault();
    $di->set('layout', function() use ($di) { return 'destruti'; }, true);
    $di->set('router', require __DIR__.'/../common/'.$di->get("layout").'/route.php');

    $application = new \Phalcon\Mvc\Application();
    $application->setDI($di);
    $application->registerModules(require __DIR__.'/../common/'.$di->get("layout").'/modules.php');

    echo $application->handle()->getContent();

}
catch (Phalcon\Exception $e) {
    error_log(date('Y.d.m h:i:s').' > '.var_export($di->get("layout").' Error Type 1 -> ' . $e->getMessage().' in '. $e->getFile(). ' line ' . $e->getLine(), true).PHP_EOL, 3, "/tmp/errors.log");
} catch (PDOException $e) {
    error_log(date('Y.d.m h:i:s').' > '.var_export($di->get("layout").' Error Type 2 -> ' . $e->getMessage().' in '. $e->getFile(). ' line ' . $e->getLine(), true).PHP_EOL, 3, "/tmp/errors.log");
}