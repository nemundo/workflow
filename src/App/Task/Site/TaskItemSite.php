<?php

namespace Nemundo\Workflow\App\Task\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Task\Parameter\TaskParameter;
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

        $taskId = (new TaskParameter())->getValue();

        $item = (new TaskProcess())->getView($page);
        $item->dataId = $taskId;

        $btn = new WorkflowActionButton($page);
        $btn->workflowId = $taskId;
        $btn->statusChangeRedirectSite = TaskStatusChangeSite::$site;

        $page->render();

    }
}