<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Core\Debug\Debug;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\Item\WorkflowItemTrait;
use Nemundo\Workflow\Com\WorkflowTitle;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Form\WorkflowFormUpdate;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;


class WorkflowActionPanelSite extends AbstractSite
{

    /**
     * @var WorkflowActionPanelSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'workflow-action-panel';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WorkflowActionPanelSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $statusChangeId = (new WorkflowStatusChangeParameter())->getValue();

        $statusChangeReader = new WorkflowStatusChangeReader();
        $statusChangeReader->model->loadWorkflow();
        $statusChangeReader->model->workflow->loadWorkflowStatus();
        $statusChangeReader->model->workflow->loadProcess();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeRow = $statusChangeReader->getRowById($statusChangeId);

        $title = new WorkflowTitle($page);
        $title->workflowId = $statusChangeRow->workflowId;

        $status = $statusChangeRow->workflowStatus->getWorkflowStatusClassObject();
        $model = (new ModelFactory())->getModelByClassName($status->modelClassName);

        /** @var WorkflowItemTrait $actionPanel */
        $actionPanel = new $status->actionPanelClassName($page);
        $actionPanel->workflowId = $statusChangeRow->workflowId;

        $btn = new BootstrapButton($page);
        $btn->content = 'Freigabe (Weiter)';
        $btn->site = clone(DraftReleaseSite::$site);
        $btn->site->addParameter(new WorkflowStatusChangeParameter($statusChangeId));

        $page->render();


    }

}