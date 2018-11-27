<?php

namespace Nemundo\Workflow\App\Identification\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;

class IdentificationConfig extends AbstractBase
{

    /**
     * @var AbstractIdentificationType[]
     */
    private static $identificationList = [];

    public static function addIdentification(AbstractIdentificationType $identificationType)
    {

        IdentificationConfig::$identificationList[$identificationType->identificationId] = $identificationType;

    }


    public function getIdentificationList()
    {

        return IdentificationConfig::$identificationList;
    }


    public function loadDefault()
    {
        IdentificationConfig::addIdentification(new UserIdentificationType());
        IdentificationConfig::addIdentification(new UsergroupIdentificationType());
    }


    public static function getIdentificationType($id)
    {

        $identificationType = null;

        if (isset(IdentificationConfig::$identificationList[$id])) {
            $identificationType = IdentificationConfig::$identificationList[$id];
            //return IdentificationConfig::$identificationList[$id];
        }
        /*else {
            (new LogMessage())->writeError('No Identification Type found. Id: ' . $id);
        }*/

        return $identificationType;

    }


}