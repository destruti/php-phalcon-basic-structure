<?php

namespace Meg\Libs;

use \Phalcon\Mvc\User\Component;

class bigdataHelper extends Component
{

    public static function getConfig()
    {
        $config = require __DIR__ . "/../../common/jair/config.php";
        return $config;
    }

    public static function getTransfer($juntospelascriancas_key)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $params = array("SecureKey" => $juntospelascriancas_key);
        curl_setopt($ch, CURLOPT_URL, self::getConfig()->api_url . "getTransfer");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $transfer_serialized = curl_exec($ch);
        return unserialize($transfer_serialized);
    }

    public static function validateTransfer($juntospelascriancas_key, $sendMailObj)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $params = array("SecureKey" => $juntospelascriancas_key, "bigdataSerializedObj" => $sendMailObj);
        curl_setopt($ch, CURLOPT_URL, self::getConfig()->api_url . "validateSerializedTransfer");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $response_serialized = curl_exec($ch);
        return unserialize($response_serialized);
    }

    public static function callExecute($juntospelascriancas_key, $sendMailObj)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $params = array("SecureKey" => $juntospelascriancas_key, "bigdataSerializedObj" => $sendMailObj);
        curl_setopt($ch, CURLOPT_URL, self::getConfig()->api_url . "execute");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $response_serialized = curl_exec($ch);
        return unserialize($response_serialized);
    }

}