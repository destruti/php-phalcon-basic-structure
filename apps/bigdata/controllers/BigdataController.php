<?php

namespace Meg\Bigdata\Controllers;

use Meg\Libs\bigdataExecutor;
use \Meg\Libs\log;
use \Meg\Libs\toolBox;
use Meg\Models\Contacts;

class BigdataController extends ControllerBase
{

    public function getTransferAction()
    {
        log::jair('['.$this->config->layout.']['.$this->getClient().'][Bigdata][controller] Request Transfer');
        $sendmail_serialized = serialize($this->makeBigdataObj());
        die($sendmail_serialized);
    }

    public function makeBigdataObj()
    {
        $bigdataObj = new \stdClass();
        $bigdataObj->cpf = '';
        return $bigdataObj;
    }

    public function verifyBigdataObj($BigdataObj)
    {

        $response = array();
        if ($BigdataObj->cpf == '') $response[] = 'cpf';

        if (count($response) == 0) {
            log::jair('['.$this->config->layout.']['.$this->getClient().'][Bigdata][controller] Transfer OK');
            return array(
                'status' => 'obj_ok',
            );
        }

        if (count($response) != 0) {
            log::jair('['.$this->config->layout.']['.$this->getClient().'][Bigdata][controller] Transfer with Error');
            log::jair($response);
            return array(
                'status' => 'error',
                'desc'   => $response,
            );
        }

    }

    public function validateSerializedTransferAction()
    {
        log::jair('['.$this->config->layout.']['.$this->getClient().'][Bigdata][controller] Validating Transfer');

        $bigdataObj = unserialize($_POST['bigdataSerializedObj']);

        $status = $this->verifyBigdataObj($bigdataObj);
        $status_serialized = serialize($status);
        die($status_serialized);
    }

    public function executeAction()
    {

        $bigdataObj = unserialize($_POST['bigdataSerializedObj']);

        bigdataExecutor::makeCpfSearch($bigdataObj->cpf, $this->getClient());
        $bigdata_response = bigdataExecutor::getCpfInfos($bigdataObj->cpf, $this->getClient());




        // CAROL  38055894841
        // LEON   11783506733
        // TC     36553502870
        // ED     08834428846
        // SILVIA 05102368800
        // DUDU   31778891802
        // REGINA 05523921890
        // PAI TC 04411922894
        // PEDRO  42591572801
        // BIA    04129491806
        // JOAO   91479193887
        // GUTO   04702637843


        //$campaign = @$_POST['campaign'];
        //$name     = @$_POST['name_checkout'];
        //$cpf      = @$_POST['cpf_checkout'];
        //$email    = @$_POST['email_checkout'];
        //$cel      = @$_POST['cel_checkout'];
        //
        //log::nasp2('<span class="checkout">['.strtoupper($this->config->layout).'] /'.$campaign. ' ' . $name . '</span>');
        //
        //log::nasp2('['.strtoupper($this->config->layout).'][BIGDATA][Start] '.$cpf);
        //log::nasp2('['.strtoupper($this->config->layout).'][BIGDATA][Ip...] '.$_SERVER['REMOTE_ADDR']);
        //log::nasp2('['.strtoupper($this->config->layout).'][BIGDATA][Nome.] '.$name);
        //log::nasp2('['.strtoupper($this->config->layout).'][BIGDATA][Cel..] '.$cel);
        //log::nasp2('['.strtoupper($this->config->layout).'][BIGDATA][Email] '.$email);
        //
        //$bigDataStatus = $this->config->bigdata_status;
        //
        //$infos = bigdata::cpfSearch($cpf, $bigDataStatus);
        //foreach ($infos as $field => $info) {
        //if ($info == '') continue;
        //log::nasp2('['.strtoupper($this->config->layout).'][BIGDATA][RESPONSE][' . $field . '] ' . $info);
        //}
        //
        //$response = array(
        //'birthday_checkout'     => $infos['Birthdate'],
        //'sexo_checkout'         => $infos['Gender'],
        //'cep_checkout'          => $infos['ZipCode'],
        //'address_checkout'      => $infos['AddressCore'],
        //'numero_checkout'       => intval($infos['Number']),
        //'complemento_checkout'  => $infos['Complement'],
        //'neighborhood_checkout' => $infos['Neighborhood'],
        //'city_checkout'         => $infos['City'],
        //'state_checkout'        => $infos['State'],
        //);















        $bigdata_response['status'] = 'success';
        $response = $bigdata_response;

        log::jair('['.$this->config->layout.']['.$this->getClient().'][Bigdata][bigdata] Returned for '.$bigdata_response['Cpf']);
        log::jair('');

        $response_serialized = serialize($response);
        die($response_serialized);
    }

}