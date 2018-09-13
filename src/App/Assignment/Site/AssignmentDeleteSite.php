<?php

namespace Nemundo\Workflow\App\Assignment\Site;


use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentDelete;
use Nemundo\Workflow\App\Assignment\Parameter\AssignmentParameter;

class AssignmentDeleteSite extends AbstractIconSite
{

    /**
     * @var AssignmentDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'delete';
        $this->icon = new DeleteIcon();
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        AssignmentDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        $assignmentId = (new AssignmentParameter())->getValue();
        (new AssignmentDelete())->deleteById($assignmentId);
        (new UrlReferer())->redirect();

    }


}