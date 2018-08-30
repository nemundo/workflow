<?php

namespace Nemundo\Workflow\App\Identification\Model;


use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\External\Id\ExternalUniqueIdType;
use Nemundo\Model\Type\Id\UniqueIdType;
use Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeExternalType;

class IdentificationModelType extends AbstractComplexType
{

    /**
     * @var ExternalUniqueIdType
     */
    public $identificationTypeId;

    /**
     * @var IdentificationTypeExternalType
     */
    //public $identificationType;

    /**
     * @var UniqueIdType
     */
    public $identificationId;

    protected function loadType()
    {

        $this->fieldMapping = false;

        $this->identificationTypeId = new UniqueIdType();
        $this->addType($this->identificationTypeId);

        $this->identificationId = new UniqueIdType();
        $this->addType($this->identificationId);

        $this->tableItemClassName = IdentificationModelItem::class;
        $this->viewItemClassName = IdentificationModelItem::class;

    }


    public function createObject()
    {

        $this->identificationTypeId->fieldName = $this->fieldName . '_type';
        $this->identificationTypeId->aliasFieldName = $this->aliasFieldName . '_type';
        $this->addType($this->identificationTypeId);

        $this->identificationId->fieldName = $this->fieldName . '_id';
        $this->identificationId->aliasFieldName = $this->aliasFieldName . '_id';
        $this->addType($this->identificationId);

    }

}