<?php

namespace Nemundo\Workflow\App\Calendar\Reader;


use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\App\Calendar\Data\Calendar\CalendarReader;

class CalendarIdentificationReader extends CalendarReader
{

    /**
     * @return \Nemundo\Workflow\App\Calendar\Data\Calendar\CalendarRow[]
     */
    public function getData()
    {

        $this->filter->orEqual($this->model->identification, (new UserInformation())->getUserId());

        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $this->filter->orEqual($this->model->identification, $usergroupId);
        }

        return parent::getData();
    }

}