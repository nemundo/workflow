<?php

namespace Nemundo\Workflow\App\PersonalTask\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\Redirect\PersonalTaskFileRedirectSite;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\App\Workflow\Process\Item\ProcessContentView;

class PersonalTaskItemSite extends AbstractSite
{

    /**
     * @var PersonalTaskItemSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'personal-task-item';
        $this->menuActive = false;
        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new SchleunigerUsergroup());

        new PersonalTaskStatusChangeSite($this);
        new PersonalTaskFileRedirectSite($this);

    }

    protected function registerSite()
    {
        PersonalTaskItemSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $dataId = (new DataIdParameter())->getValue();


        $workflow = new ProcessContentView($page);
        $workflow->contentType= new PersonalTaskProcess();
        $workflow->showBaseData = false;
        $workflow->dataId = $dataId;
        $workflow->statusChangeRedirectSite = PersonalTaskStatusChangeSite::$site;


        $btn = new WorkflowActionButton($page);
        $btn->workflowId = $dataId;
        $btn->statusChangeRedirectSite = PersonalTaskStatusChangeSite::$site;


        $page->render();


    }
}