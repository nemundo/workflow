<?php

namespace Nemundo\Workflow\App\MailConfig\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigFormUpdate;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigId;

class MailConfigEditSite extends AbstractSite
{

    /**
     * @var MailConfigEditSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'eMail Einstellungen editieren';
        $this->url = 'mail-config-edit';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        MailConfigEditSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $id = new MailConfigId();
        $id->filter->andEqual($id->model->userId, (new UserSessionType())->userId);
        $mailConfigId = $id->getId();


        $update = new MailConfigFormUpdate($page);
        $update->updateId = $mailConfigId;
        $update->redirectSite = MailConfigSite::$site;

        $page->render();

    }

}