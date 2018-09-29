<?php

namespace Nemundo\Workflow\App\Identification\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;

class IdentificationConfig extends AbstractBase
{


    private static $identificationList = [];

    public static function addIdentification(AbstractIdentificationType $identificationType)
    {

        IdentificationConfig::$identificationList[$identificationType->id] = $identificationType;

    }


    public function loadDefault()
    {
        IdentificationConfig::addIdentification(new UserIdentificationType());
        IdentificationConfig::addIdentification(new UsergroupIdentificationType());
    }


    public static function getIdentificationType($id)
    {


        if (isset(IdentificationConfig::$identificationList[$id])) {
            return IdentificationConfig::$identificationList[$id];
        } else {
            (new LogMessage())->writeError('No Identification Type found');
        }




    }


}