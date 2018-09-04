<?php

namespace Nemundo\Workflow\App\Identification\Type;


use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Usergroup\UsergroupMembership;

class UsergroupIdentificationType extends AbstractIdentificationType
{

    protected function loadIdentification()
    {
        $this->id = 'ad5c33f6-88d9-444a-89e5-8f41a56fb5e3';
        $this->identification = 'Usergroup';
    }


    /*
        public function getFilter()
        {

            foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
                $this->filter->orEqual($this->model->identification, $usergroupId);
            }

        }*/


    public function getValue($identificationId)
    {

        $row = (new UsergroupReader())->getRowById($identificationId);
        return $row->usergroup;

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