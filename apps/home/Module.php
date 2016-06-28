<?php

namespace Meg\Home;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new \Phalcon\Loader();

		$loader->registerNamespaces(array(
			'Meg\Home\Controllers' => __DIR__.'/controllers/',
			'Meg\Models'           => __DIR__.'/../../db/',
		));

		$loader->register();
	}

	public function registerServices($di)
	{

        $layout = $di->get("layout");

        /**
         * Read configuration
         */
        $config = require __DIR__ . "/../../common/".$layout."/config.php";
        $di->set('config', $config);

		/**
		 * Setting up the view component
		 */
		$di->set('view', function() use ($layout) {

			$view = new \Phalcon\Mvc\View();
            $view->setViewsDir(__DIR__.'/../views/'.$layout.'/');
            $view->setTemplateBefore($layout);
            $view->registerEngines(array(
				".phtml"  => function($view, $di) {
					$phtml = new \Phalcon\Mvc\View\Engine\Php($view, $di);
					return $phtml;
				},
			));

			return $view;

		});

		/**
		 * Database connection is created based in the parameters defined in the configuration file
		 */
		$di->set('db', function() use ($config) {
			return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
				"host"     => $config->database->host,
				"username" => $config->database->username,
				"password" => $config->database->password,
				"dbname"   => $config->database->name,
				'options'  => array(
					\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
					\PDO::ATTR_CASE => \PDO::CASE_LOWER
				)
			));
		});

	}
}