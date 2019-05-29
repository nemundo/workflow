<?php

namespace Nemundo\Workflow\App\Assignment\Widget;

use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Assignment\Com\Table\AssignmentTable;
use Nemundo\Workflow\App\Assignment\Site\AssignmentSite;


class AssignmentWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Aufgaben';
        $this->widgetSite = AssignmentSite::$site;
    }


    public function getContent()
    {

        $table = new AssignmentTable($this);
        $table->showArchive = false;
        $table->addUserId((new UserSessionType())->userId);


        return parent::getContent();

    }

}