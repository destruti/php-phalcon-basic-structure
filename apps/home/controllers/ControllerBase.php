<?php

namespace Meg\Home\Controllers;

use Meg\Libs\log;
use Phalcon\Tag;

class ControllerBase extends \Phalcon\Mvc\Controller
{

	protected function initialize()
	{
        log::destruti('['.$this->config->layout.'][Home] Start App');

    }

}