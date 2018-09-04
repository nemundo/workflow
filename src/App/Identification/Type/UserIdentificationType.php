<?php

namespace Nemundo\Workflow\App\Identification\Type;


use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Information\UserInformation;

class UserIdentificationType extends AbstractIdentificationType
{

    protected function loadIdentification()
    {

        $this->id = '5f6983b9-ab9d-4f63-8cc4-891227dd0750';
        $this->identification = 'User';

    }


    public function getValue($identificationId)
    {

        $userRow = (new UserReader())->getRowById($identificationId);
        return $userRow->displayName;

    }


    public function getUserIdList()
    {

        $list = [];
        $list[] = (new UserInformation())->getUserId();
        return $list;

    }

}