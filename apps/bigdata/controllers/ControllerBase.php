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
        $secure_key = $_POST['SecureKey'];

        if (!isset($this->config->keys->$secure_key)) {

            log::jair('['.$this->config->layout.']['.$this->getClient().'][Bigdata][Initialize] Unapproved Validation');
            log::jair('POST CONTENT');
            log::jair($_POST);
            log::jair('');

            $response = new \Phalcon\Http\Response();
            $response->redirect($this->config->website.'?error=secure_key', true);
            $response->send();
            die;
        }

        $this->setClient($this->config->keys->$secure_key);
        log::jair('['.$this->config->layout.']['.$this->getClient().'][Bigdata][Initialize] Validation Guaranteed');

    }

}