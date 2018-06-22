<?php

namespace Nemundo\Workflow\App\PasswordReset\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest\PasswordResetRequestReader;
use Nemundo\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class PasswordChangeSite extends AbstractSite
{

    /**
     * @var PasswordChangeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'password-reset';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        PasswordChangeSite::$site=$this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $workflow = new WorkflowItem((new WorkflowParameter())->getValue());

        $passwordResetRow = (new PasswordResetRequestReader())->getRowById($workflow->getDataId());

        $title = new AdminTitle($page);
        $title->content = $passwordResetRow->login;



        $page->render();

    }


}