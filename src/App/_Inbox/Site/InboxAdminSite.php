<?php

namespace Nemundo\Workflow\App\Inbox\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxPaginationTable;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxTable;

class InboxAdminSite extends AbstractSite
{

    /**
     * @var InboxAdminSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Inbox Admin';
        $this->url = 'app-inbox-admin';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $table = new InboxPaginationTable($page);
        $table->model->loadUser();
        $table->model->loadContentType();


        $page->render();


    }


}