<?php

namespace Nemundo\Workflow\App\Assignment\Widget;

use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Assignment\Com\Table\AssignmentTable;
use Nemundo\Workflow\App\Assignment\Site\AssignmentSite;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;


class AssignmentWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Aufgaben';  // (Assignment)';
        $this->widgetSite = AssignmentSite::$site;
    }


    public function getHtml()
    {

        $table = new AssignmentTable($this);
        //$table->showArchive = false;
        $table->addUserId((new UserInformation())->getUserId());

        return parent::getHtml();

    }

}