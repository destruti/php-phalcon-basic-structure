<?php

namespace Meg\Bigdata\Controllers;

use Phalcon\Tag;

use \Meg\Libs\log;

class ControllerBase extends \Phalcon\Mvc\Controller
{

    private $client;

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    protected function initialize()
	{
        $this->setClient('phalcon');
        log::destruti('['.$this->config->layout.']['.$this->getClient().'][Bigdata][Initialize] Validation Guaranteed');

    }

}