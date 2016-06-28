<?php

namespace Meg\Libs;

use \Phalcon\Mvc\User\Component;

class bigdataExecutor extends Component
{

    public static function getConfig()
    {
        $config = require __DIR__ . "/../../common/jair/config.php";
        return $config;
    }

    public static function cleanCpf($cpf)
    {
        if ($cpf == '') return 'error';
        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace(' ','',$cpf);
        $cpf = str_replace('-','',$cpf);
        return $cpf;
    }

    public static function makeCpfSearch($cpf, $client)
    {

        $cpf = self::cleanCpf($cpf);
        $config = self::getConfig();

        try {

            if (file_exists($config->bigdata->folder.$cpf.'.json')) {
                log::jair('['.$config->layout.']['.$client.'][Bigdata][helper....] Local File');
            } else {
                $json = file_get_contents($config->bigdata->url.$cpf);
                file_put_contents($config->bigdata->folder.$cpf.'.json', $json);
                log::jair('['.$config->layout.']['.$client.'][Bigdata][helper....] External File');
            }

        } catch (\Exception $e) {
            log::jair('['.$config->layout.']['.$client.'][Bigdata][helper....] Error on Search CPF');
            log::jair($e);
        }

    }

    public static function getCpfInfos($cpf, $client)
    {
        $config = self::getConfig();
        $json = file_get_contents($config->bigdata->folder.$cpf.'.json');

        $infos = json_decode($json,TRUE);

        $clean = array();
        $clean['Cpf']          = $cpf;
        $clean['Name']         = '';
        $clean['Gender']       = '';
        $clean['Birthdate']    = '';
        $clean['Tel']          = '';
        $clean['AddressCore']  = '';
        $clean['Number']       = '';
        $clean['Complement']   = '';
        $clean['Neighborhood'] = '';
        $clean['City']         = '';
        $clean['State']        = '';
        $clean['ZipCode']      = '';

        if (!$config->bigdata->active) {
            log::jair('['.$config->layout.']['.$client.'][Bigdata][helper....] Atention: Bigdata DISABLED');
            return $clean;
        }

        if (count($infos['OperationResult']['Entities']) == 0) {
            log::bigdata($clean);
            return $clean;
        }

        if (count(@$infos) == 0) {
            log::bigdata($clean);
            return $clean;
        }

        if (count(@$infos['OperationResult']) == 0) {
            log::bigdata($clean);
            return $clean;
        }

        if (count(@$infos['OperationResult']['Entities']) == 0) {
            log::bigdata($clean);
            return $clean;
        }

        if (count(@$infos['OperationResult']['Entities'][3]) == 0) {
            log::bigdata($clean);
            return $clean;
        }

        if (count(@$infos['OperationResult']['Entities'][3]['People']) == 0) {
            log::bigdata($clean);
            return $clean;
        }

        if (count(@$infos['OperationResult']['Entities'][3]['People'][0]) == 0) {
            log::bigdata($clean);
            return $clean;
        }

        $informations = $infos['OperationResult']['Entities'][3]['People'][0];

        $clean['Name'] = $informations['Name'];
        $clean['Birthdate'] = $informations['Birthdate'];
        $clean['Gender'] = $informations['Gender'];

        if (count($informations['Contacts']) != 0) {
            foreach ($informations['Contacts'] as $information) {

                if ($information['Address']['AddressCore'] != '') {

                    if ($clean['AddressCore'] == null) {

                        $clean['AddressCore']  = $information['Address']['AddressCore'];
                        $clean['Number']       = $information['Address']['Number'];
                        $clean['Complement']   = $information['Address']['Complement'];
                        $clean['Neighborhood'] = $information['Address']['Neighborhood'];
                        $clean['City']         = $information['Address']['City'];
                        $clean['State']        = $information['Address']['State'];
                        $clean['ZipCode']      = $information['Address']['ZipCode'];

                    }

                }

                if ($information['Phone']['Number'] != '') {

                    if ($clean['Tel'] == null) {
                        $clean['Tel']  = $information['Phone']['AreaCode'].$information['Phone']['Number'];
                    }

                }

            }
        }

        foreach ($clean as $key => $conteudo) {
            $organized[$key] = ucwords(mb_strtolower($conteudo));

            if ($key == 'Birthdate') {
                $organized['Birthdate'] = date("d/m/Y", strtotime($conteudo));
            }

            if (@$organized['Birthdate'] == '31/12/1969') {
                $organized['Birthdate'] = '';
            }

            if ($key == 'ZipCode') {
                $organized['ZipCode'] = substr($conteudo,0,5).'-'.substr($conteudo,5,8);
            }

            if (@$organized['ZipCode'] == '-') {
                $organized['ZipCode'] = '';
            }

            if ($key == 'Gender') {
                $organized['Gender'] = ($conteudo == 'M' ? '1' : '').($conteudo == 'F' ? '2' : '');
            }

        }

        log::bigdata($organized);

        return $organized;

    }

}
