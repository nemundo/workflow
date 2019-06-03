<?php

namespace Nemundo\Workflow\App\Assignment\Widget;

use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Assignment\Com\Table\AssignmentTable;
use Nemundo\Workflow\App\Assignment\Site\AssignmentSite;


class AssignmentWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
<<<<<<< HEAD
        $this->widgetTitle = 'Aufgaben';
=======

        $this->widgetTitle[LanguageCode::EN] = 'Assignment';
        $this->widgetTitle[LanguageCode::DE] = 'Zuweisungen';  // 'Aufgaben';

        //$this->widgetTitle = 'Aufgaben';  // (Assignment)';

>>>>>>> 16bc11b3f077d7ba5977bc26974b77bf5c19a229
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