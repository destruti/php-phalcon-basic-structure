<?php

namespace Meg\Libs;

use \Phalcon\Mvc\User\Component;

class log extends Component
{

    public static function dump($dumpContent)
    {
        echo '<pre>';print_r($dumpContent);echo '</pre>';
    }

    public static function jair($message)
    {
        error_log(date('Y.m.d H:i:s').' '.var_export($message, true).PHP_EOL, 3, "/tmp/jair.log");
    }

    public static function bigdata($message)
    {
        error_log(date('Y.m.d H:i:s').' '.var_export($message, true).PHP_EOL, 3, "/tmp/bigdata.log");
    }

    public static function audit($message)
    {
        error_log(date('Y.m.d H:i:s').' '.var_export($message, true).PHP_EOL, 3, "/tmp/audit.log");
    }

}
