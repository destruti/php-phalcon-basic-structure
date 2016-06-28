<?php

namespace Meg\Home\Controllers;

use \Meg\Libs\bigdataHelper;
use \Meg\Libs\log;
use \Meg\Libs\toolBox;

class HomeController extends ControllerBase
{

    public function indexAction() {}

    public function serverTestAction()
    {
        $bigdataObj = bigdataHelper::getTransfer($_POST['SecureKey']);
        $bigdataObj->cpf = '31778891802';

        $bigdataObj_serialized = serialize($bigdataObj);
        $responseFromValidation = bigdataHelper::validateTransfer($_POST['SecureKey'], $bigdataObj_serialized);

        if ($responseFromValidation['status'] == 'obj_ok') {

            $resultExecute = bigdataHelper::callExecute($_POST['SecureKey'], $bigdataObj_serialized);

            if ($resultExecute['status'] == 'errors') {
                log::dump('description of troubles');
                log::dump($resultExecute['errors'][0]['code'] . ' - ' . $resultExecute['errors'][0]['description']);
            } else {
                log::dump($resultExecute);
            }

        } else {
            log::dump($responseFromValidation['desc']);
        }

        die();
    }

}