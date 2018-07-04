<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\User\Usergroup\AbstractUsergroup;

class UsergroupAssignmentWidget extends AbstractAdminWidget
{

    /**
     * @var AbstractUsergroup
     */
    public $usergroup;


    protected function loadWidget()
    {
        $this->widgetTitle = '';
        $this->widgetId = '';
    }


    public function getHtml()
    {

        if (!$this->checkObject('usergroup', $this->usergroup, AbstractUsergroup::class)) {
            return parent::getHtml();
        }


        $this->widgetTitle = 'Aufgaben für ' . $this->usergroup->name;








        return parent::getHtml();


    }


}