<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\WorkflowTitle;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Form\WorkflowFormUpdate;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Schleuniger\Template\SchleunigerTemplate;

class WorkflowFormUpdateSite extends AbstractSite
{

    /**
     * @var WorkflowFormUpdateSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'workflow-update';
        $this->menuActive = true;
    }


    protected function registerSite()
    {
        WorkflowFormUpdateSite::$site = $this;
    }


    public function loadContent()
    {

        $page = new SchleunigerTemplate();


        $statusChangeId = (new WorkflowStatusChangeParameter())->getValue();

        $statusChangeReader = new WorkflowStatusChangeReader();
        $statusChangeReader->model->loadWorkflow();
        $statusChangeReader->model->workflow->loadApplication();
        $statusChangeRow = $statusChangeReader->getRowById($statusChangeId);

        $title = new WorkflowTitle($page);
        $title->workflowId = $statusChangeRow->workflowId;

        $status = $statusChangeRow->workflowStatus->getWorkflowStatusClassObject();
        $application = $statusChangeRow->workflow->application->getApplicationTypeClassNameObject();
        $model =(new ModelFactory())->getModelByClassName($status->modelClassName);

        $form = new WorkflowFormUpdate($page);
        $form->model = $model;
        $form->updateId = $statusChangeRow->workflowItemId;
        $form->redirectSite = $application->getApplicationSite($statusChangeRow->workflowId);



        //$form->workflowStatus = $status;
        //$form->workflowId = $workflowId;

        /*
        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();

        $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;

        $workflowRow = (new WorkflowReader())->getRowById($workflowId);

        $status = $workflowRow->workflowStatus->getWorkflowStatusClassObject();
        $model =(new ModelFactory())->getModelByClassName($status->modelClassName);

        $form = new WorkflowFormUpdate($page);
        $form->workflowStatus = $status;
        $form->workflowId = $workflowId;*/



        $page->render();


    }

}