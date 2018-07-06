<?php

namespace Nemundo\Workflow\App\PersonalTask\Site;

use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\Workflow\ContentItem\WorkflowContentItem;
use Nemundo\Workflow\Parameter\DataIdParameter;
use Schleuniger\App\Kvp\Site\KvpWorkflowStatusChangeSite;
use Schleuniger\App\Task\Template\TaskTemplate;
use Schleuniger\Usergroup\SchleunigerUsergroup;
use Nemundo\Web\Site\AbstractSite;
use Schleuniger\App\Task\Page\TaskItemPage;
use Schleuniger\App\Task\Page\TaskNewPage;
use Nemundo\Workflow\Com\View\WorkflowViewList;
use Schleuniger\App\Task\Process\TaskProcess;
use Nemundo\Workflow\Parameter\WorkflowParameter;

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
        //(new TaskItemPage())->render();


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        //TaskSite::$site->showMenuAsActive = true;

        //$workflowId = (new WorkflowParameter())->getValue();

        $dataId = (new DataIdParameter())->getValue();


        $personalTaskRow = (new PersonalTaskReader())->getRowById($dataId);


        $workflow = new WorkflowContentItem($page);
        $workflow->showBaseData = false;
        $workflow->workflowId = $personalTaskRow->workflowId;
        $workflow->statusChangeRedirectSite = PersonalTaskStatusChangeSite::$site;

            //KvpWorkflowStatusChangeSite::$site;  // TaskStatusChangeSite::$site;

        /*
                $workflow = new WorkflowViewList($page);
                $workflow->process = new PersonalTaskProcess();
                $workflow->showSubscription = false;
                $workflow->workflowId = $workflowId;
                //$workflow->statusChangeRedirectSite = TaskStatusChangeSite::$site;
                $workflow->sortOrder = SortOrder::DESCENDING;*/

        $page->render();


    }
}