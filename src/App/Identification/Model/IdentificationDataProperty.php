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

                $this->typeValueList->setModelValue($this->type->identificationTypeId, $identification->identificationType->identificationId);
                $this->typeValueList->setModelValue($this->type->identificationId, $identification->identificationId);

            } else {

                // Problem: es wird überschrieben und auf null gesetzt

                //$this->typeValueList->setModelValue($this->type->identificationTypeId,'');
                //$this->typeValueList->setModelValue($this->type->identificationId, '');

            }

        }

        return $this;

    }

}