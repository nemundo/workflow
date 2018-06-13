<?php

namespace Nemundo\Workflow\Site\StatusChange;

use Nemundo\Com\Html\Basic\H2;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Admin\ModelAdmin;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\Container\Change\WorkflowStatusChangeContainer;
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeCount;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\Site\Search\WorkflowSearchEngineSite;
use Nemundo\Workflow\Site\WorkflowItemSite;
use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractFormWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class StatusChangeSite extends AbstractSite
{

    /**
     * @var StatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        StatusChangeSite::$site = $this;
    }


    public function loadContent()
    {

        $workflowStatusId = (new WorkflowStatusParameter())->getValue();

        $workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);

        /** @var AbstractWorkflowStatus|AbstractDataListWorkflowStatus|AbstractFormWorkflowStatus $workflowStatus */
        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;

        $container = new WorkflowStatusChangeContainer($page);
        $container->workflowStatus = $workflowStatus;
        $container->workflowId = $workflowId;
        $container->redirectSite = WorkflowSearchEngineSite::$site;

        $page->render();

    }

}