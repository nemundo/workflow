<?php

namespace Nemundo\Workflow\App\Task\Site;

use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Task\Process\TaskProcess;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;

class TaskItemSite extends AbstractSite
{

    /**
     * @var TaskItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'task-item';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        TaskItemSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $item = (new TaskProcess())->getItem($page);
        $item->dataId = (new DataIdParameter())->getValue();

        $btn = new WorkflowActionButton($page);
        $btn->workflowId = (new DataIdParameter())->getValue();
        $btn->statusChangeRedirectSite = TaskStatusChangeSite::$site;


        $page->render();


    }
}