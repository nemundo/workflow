<?php

namespace Nemundo\Workflow\App\Identification\Filter;


use Nemundo\Db\Filter\Filter;
use Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeReader;

class IdentificationFilter
{

    public function getFilter()
    {

        $filter = new Filter();

        $identificationTypeReader = new IdentificationTypeReader();
        foreach ($identificationTypeReader->getData() as $identificationTypeRow) {

            $identificationType = $identificationTypeRow->getIdentificationTypeClassObject();
            foreach ($identificationType->getUserIdList() as $value) {
                $filter->orEqual($taskReader->model->identificationId, $value);
            }

        }

        return $filter;


    }


}