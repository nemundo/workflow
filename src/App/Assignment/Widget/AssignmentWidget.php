<?php

namespace Nemundo\Workflow\App\Assignment\Widget;

use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\User\Type\UserSession;
use Nemundo\Workflow\App\Assignment\Com\Table\AssignmentTable;
use Nemundo\Workflow\App\Assignment\Site\AssignmentSite;


class AssignmentWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {

        //$this->widgetTitle = 'Aufgaben';

        $this->widgetTitle[LanguageCode::EN] = 'Assignment';
        $this->widgetTitle[LanguageCode::DE] = 'Zuweisungen';  // 'Aufgaben';

        //$this->widgetTitle = 'Aufgaben';  // (Assignment)';

        $this->widgetSite = AssignmentSite::$site;

    }


    public function getContent()
    {

        $table = new AssignmentTable($this);
        $table->showArchive = false;
        $table->addUserId((new UserSession())->userId);


        return parent::getContent();

    }

}