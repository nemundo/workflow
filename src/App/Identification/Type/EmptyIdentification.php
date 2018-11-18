<?php

namespace Nemundo\Workflow\App\Identification\Type;


class EmptyIdentification extends AbstractIdentificationType
{

    protected function loadIdentification()
    {

        $this->identificationId = '';

        //$this->identification = 'User';

    }



    public function getValue($identificationId)
    {

              return null;

    }


    public function getIdentificationIdFromUserId($userId)
    {

    }

    public function getUserIdListFromIdentificationId($identificationId)
    {



    }


    public function getUserIdList()
    {



    }

}