<?php

namespace Meg\Bigdata\Controllers;

use \Meg\Libs\log;

class BigdataController extends ControllerBase
{

    public function getTransferAction()
    {
        log::destruti('['.$this->config->layout.']['.$this->getClient().'][Bigdata][controller] Request Transfer');
        $sendmail_serialized = serialize($this->makeBigdataObj());
        die($sendmail_serialized);
    }

    public function makeBigdataObj()
    {
        $bigdataObj = new \stdClass();
        $bigdataObj->type_of_lead = '';
        return $bigdataObj;
    }

}