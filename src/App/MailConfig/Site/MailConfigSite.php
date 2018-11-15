<?php

namespace Nemundo\Workflow\App\MailConfig\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfig;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigCount;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigFormUpdate;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigId;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigView;

class MailConfigSite extends AbstractSite
{

    /**
     * @var MailConfigSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'eMail Einstellungen';
        $this->url = 'mail-config';

        //new MailConfigEditSite($this);

    }


    protected function registerSite()
    {
        MailConfigSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $email = new BootstrapTextBox($page);
        $email->label = 'eMail';
        $email->disabled = true;
        $email->value = (new UserSessionType())->email;


        $count = new MailConfigCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        if ($count->getCount() == 0) {

            $data = new MailConfig();
            $data->userId = (new UserSessionType())->userId;
            $data->assignmentMail = true;
            $data->inboxMail = true;
            $data->save();

        }

        $id = new MailConfigId();
        $id->filter->andEqual($id->model->userId, (new UserSessionType())->userId);
        $mailConfigId = $id->getId();


        $update = new MailConfigFormUpdate($page);
        $update->updateId = $mailConfigId;
        $update->redirectSite = MailConfigSite::$site;


        /*
        $row = new BootstrapRow($page);
        $col = new BootstrapColumn($row);
        $col->columnWidth = 4;

        $title = new AdminTitle($col);
        $title->content =$this->title;


        $count = new MailConfigCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        if ($count->getCount() == 0) {

            $data = new MailConfig();
            $data->userId = (new UserSessionType())->userId;
            $data->assignmentMail = true;
            $data->inboxMail = true;
            $data->save();

        }


        $id = new MailConfigId();
        $id->filter->andEqual($id->model->userId, (new UserSessionType())->userId);
        $mailConfigId = $id->getId();

        $view = new MailConfigView($col);
        $view->dataId = $mailConfigId;

        $btn = new AdminButton($col);
        $btn->content = 'Editieren';
        $btn->site = MailConfigEditSite::$site;

        //$update = new MailConfigFormUpdate($page);
        //$update->updateId = $mailConfigId;*/


        $page->render();


    }


}