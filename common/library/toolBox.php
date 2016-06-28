<?php

namespace Meg\Libs;

use \Phalcon\Mvc\User\Component;

class toolBox extends Component
{

    public static function getDeviceType()
    {
        $detect = new \Mobile_Detect;
        return ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'web');
    }

}
