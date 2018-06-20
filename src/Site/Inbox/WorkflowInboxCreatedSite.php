<?php

namespace Nemundo\Workflow\Site\Inbox;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Inbox\WorkflowInboxTable;

class WorkflowInboxCreatedSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Erstellte Workflows';
        $this->url = 'inbox-created';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $table = new WorkflowInboxTable($page);
        $table->addUserIdFilter((new UserInformation())->getUserId());

        $page->render();

    }

}