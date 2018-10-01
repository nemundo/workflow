<?php

namespace Nemundo\Workflow\Site\Config;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\MailConfig\MailConfig;
use Nemundo\Workflow\Data\MailConfig\MailConfigCount;
use Nemundo\Workflow\Data\MailConfig\MailConfigFormUpdate;
use Nemundo\Workflow\Data\MailConfig\MailConfigId;

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
        $title->content =$this->title;


        $id = new MailConfigId();
        $id->filter->andEqual($id->model->userId, (new UserInformation())->getUserId());
        $mailConfigId = $id->getId();


        $update = new MailConfigFormUpdate($page);
        $update->updateId = $mailConfigId;
        $update->redirectSite = MailConfigSite::$site;


        $page->render();


    }


}