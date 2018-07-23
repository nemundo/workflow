<?php

namespace Nemundo\Workflow\App\PersonalTask\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\Workflow\Process\Item\ProcessContentItem;

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

    }

    protected function registerSite()
    {
        PersonalTaskItemSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $dataId = (new DataIdParameter())->getValue();


        //$personalTaskRow = (new PersonalTaskReader())->getRowById($dataId);

        $workflow = new ProcessContentItem($page);
        $workflow->contentType= new PersonalTaskProcess();
        $workflow->showBaseData = false;
        $workflow->dataId = $dataId;  // $personalTaskRow->workflowId;
        $workflow->statusChangeRedirectSite = PersonalTaskStatusChangeSite::$site;

        $page->render();


    }
}