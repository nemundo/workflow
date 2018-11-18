<?php

namespace Nemundo\Workflow\App\Identification\Type;


use Nemundo\User\Builder\UsergroupBuilder;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Item\UserItem;
use Nemundo\User\Type\UserItemType;
use Nemundo\User\Usergroup\UsergroupMembership;

class UsergroupIdentificationType extends AbstractIdentificationType
{

    protected function loadIdentification()
    {
        $this->identificationId = 'ad5c33f6-88d9-444a-89e5-8f41a56fb5e3';
        $this->identification = 'Usergroup';
    }


    public function getValue($identificationId)
    {

        $row = (new UsergroupReader())->getRowById($identificationId);
        return $row->usergroup;

    }



    public function getUserIdListFromIdentificationId($identificationId)
    {

        $row = (new UsergroupReader())->getRowById($identificationId);

        $usergroup = $row->getUsergroupClassObject();

        $list = [];
        foreach ($usergroup->getUserList() as $userRow) {
            $list[] = $userRow->id;
        }


        return $list;

    }


    public function getIdentificationIdFromUserId($userId)
    {

        $userItem = new UserItemType($userId);

        $list = [];
        foreach ($userItem->getUsergroup() as $usergroupRow) {
            $list[] = $usergroupRow->id;
        }

        return $list;

    }



    public function getUserIdList()
    {

        $list = [];
        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $list[] = $usergroupId;
        }
        return $list;

    }


}