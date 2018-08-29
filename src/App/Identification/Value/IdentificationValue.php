<?php

namespace Nemundo\Workflow\App\Identification\Value;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;

class IdentificationValue extends AbstractBaseClass
{

    public function getValue(AbstractIdentificationType $identificationType=null, $identificationId)
    {

        $text = '';
        if ($identificationType !== null) {
            $text = $identificationType->getValue($identificationId);
        }
        return $text;

    }

}