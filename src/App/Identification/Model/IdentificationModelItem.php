<?php

namespace Nemundo\Workflow\App\Identification\Model;

use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;


class IdentificationModelItem extends AbstractModelItem
{

    /**
     * @var IdentificationModelType
     */
    public $type;

    public function getHtml()
    {

        $identificationTypeId = $this->row->getModelValue($this->type->identificationTypeId);

        $identification = new Identification();
        $identification->identificationType = IdentificationConfig::getIdentificationType($identificationTypeId);
        $identification->identificationId = $this->row->getModelValue($this->type->identificationId);

        $this->addHtml($identification->getValue());

        return parent::getHtml();

    }

}