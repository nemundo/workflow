<?php

namespace Nemundo\Workflow\Site\Inbox;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Inbox\WorkflowInboxTable;

class WorkflowInboxSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Inbox';
        $this->url = 'inbox';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $table = new WorkflowInboxTable($page);
        $table->addUserIdFilter((new UserInformation())->getUserId());

        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $table->addUsergroupIdFilter($usergroupId);
        }


        $page->render();

    }

}