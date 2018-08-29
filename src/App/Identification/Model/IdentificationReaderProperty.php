<?php

namespace Nemundo\Workflow\App\Identification\Model;


use Nemundo\Core\System\ObjectBuilder;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;

class IdentificationReaderProperty extends AbstractReaderProperty
{

    /**
     * @var IdentificationModelType
     */
    protected $type;

    public function getValue()
    {

        $identification = new Identification();


        $identificationTypeId = $this->modelRow->getModelValue($this->type->identificationTypeId);

        if ($identificationTypeId !== '') {
            $identification->identificationType = IdentificationConfig::getIdentificationType($identificationTypeId);
        }

        $identification->identificationId = $this->modelRow->getModelValue($this->type->identificationId);

        return $identification;

    }

}