<?php

namespace Nemundo\Workflow\App\Identification\Model;


use Nemundo\Model\Data\Property\AbstractDataProperty;

class IdentificationDataProperty extends AbstractDataProperty
{

    /**
     * @var IdentificationModelType
     */
    protected $type;


    public function setValue(Identification $identification = null)
    {

        if ($identification !== null) {
            $this->typeValueList->setModelValue($this->type->identificationTypeId, $identification->identificationType->id);
            $this->typeValueList->setModelValue($this->type->identificationId, $identification->identificationId);
        }

        return $this;
    }

}