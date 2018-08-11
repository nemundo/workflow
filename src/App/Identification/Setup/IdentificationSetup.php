<?php

namespace Nemundo\Workflow\App\Identification\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationType;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;

class IdentificationSetup extends AbstractBase
{

    public function addIdentification(AbstractIdentificationType $identificationType)
    {

        $data = new IdentificationType();
        $data->updateOnDuplicate = true;
        $data->id = $identificationType->id;
        $data->identification = $identificationType->identification;
        $data->identificationTypeClass = $identificationType->getClassName();
        $data->save();

    }


    public function removeUnusedIdentification() {

    }

}