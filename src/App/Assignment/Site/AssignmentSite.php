<?php

namespace Nemundo\Workflow\App\Assignment\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentTable;

class AssignmentSite extends AbstractSite
{

    /**
     * @var AssignmentSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Assignment';
        $this->url = 'assignment';
    }


    protected function registerSite()
    {
        AssignmentSite::$site= $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $table = new AssignmentTable($page);

        $page->render();



    }
}