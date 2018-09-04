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

            if ($identification->identificationType !== null) {

                $this->typeValueList->setModelValue($this->type->identificationTypeId, $identification->identificationType->id);
                $this->typeValueList->setModelValue($this->type->identificationId, $identification->identificationId);
                //$this->typeValueList->setModelValue($this->type->identificationId, $identification->identificationId);

            } else {
                //$this->typeValueList->setModelValue($this->type->identificationTypeId, '');

            }

            //$this->typeValueList->setModelValue($this->type->identificationId, $identification->identificationId);


        }

        return $this;
    }

}