<?php

namespace Nemundo\Workflow\App\Assignment\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Assignment\Com\Form\AssignmentSearchForm;
use Nemundo\Workflow\App\Assignment\Com\Table\AssignmentTable;


class AssignmentAdminSite extends AbstractSite
{

    /**
     * @var AssignmentSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Assignment Admin';
        $this->url = 'assignment-admin';

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
        $table->showIdentificationType=true;
        $table->showDebug=true;
        $table->filter = $searchForm->getFilter();


        $page->render();

    }

}