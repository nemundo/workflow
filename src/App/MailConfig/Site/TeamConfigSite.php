<?php

namespace Nemundo\Workflow\Site\Config;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\TeamInbox\Data\TeamUser\TeamUserAdmin;

class TeamConfigSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Team Einstellungen';
        $this->url = 'team-config';

    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $admin = new TeamUserAdmin($page);
        $admin->filter->andEqual($admin->model->userId, (new UserInformation())->getUserId());


        $page->render();

    }

}