<?php

namespace Nemundo\Workflow\App\Assignment\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Assignment\Com\Form\AssignmentSearchForm;
use Nemundo\Workflow\App\Assignment\Com\Table\AssignmentTable;


class AssignmentSite extends AbstractSite
{

    /**
     * @var AssignmentSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Assignment';  // 'Aufgaben';
        $this->url = 'assignment';

        new AssignmentDeleteSite($this);

    }


    protected function registerSite()
    {
        AssignmentSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $searchForm = new AssignmentSearchForm($page);

        $table = new AssignmentTable($page);
        $table->filter = $searchForm->getFilter();

        $page->render();

    }

}