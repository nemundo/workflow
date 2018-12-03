<?php

namespace Nemundo\Workflow\App\Identification\Type;


use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Type\UserItemType;
use Nemundo\User\Type\UserSessionType;
use Schleuniger\App\Org\Content\Type\MitarbeiterType;

class UserIdentificationType extends AbstractIdentificationType
{

    protected function loadIdentification()
    {

        $this->identificationId = '5f6983b9-ab9d-4f63-8cc4-891227dd0750';
        $this->identification = 'User';

    }


    public function getValue($identificationId)
    {

        $value = 'Benutzer existiert nicht';


        $reader = new UserReader();
        $reader->filter->andEqual($reader->model->id, $identificationId);
        foreach ($reader->getData() as $userRow) {
            $value = $userRow->displayName;
        }

        //$userType = new MitarbeiterType($identificationId);
        //$value = $userType->getSubject();

        return $value;

    }


    public function getIdentificationIdFromUserId($userId)
    {
        $list = [];
        $list[] = $userId;
        return $list;
    }


    public function getUserIdListFromIdentificationId($identificationId)
    {

        $list = [];
        $list[] = $identificationId;
        return $list;

    }


    public function getUserIdList()
    {

        $list = [];
        $list[] = (new UserSessionType())->userId;
        return $list;

    }

}