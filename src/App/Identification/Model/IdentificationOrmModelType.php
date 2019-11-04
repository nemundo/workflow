<?php

namespace Nemundo\Workflow\App\Identification\Model;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Orm\Type\OrmTypeTrait;

class IdentificationOrmModelType extends IdentificationModelType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Identification';
        $this->typeId = 'b8b75242-ada5-4820-b486-005f7cf5bfe1';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, IdentificationModelType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, IdentificationModelType::class);

    }

    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataObject($phpClass, $phpFunction, Identification::class, IdentificationDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowObjectProperty($phpClass, Identification::class, IdentificationReaderProperty::class);

    }


}