<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\WorkflowTitle;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Form\WorkflowFormUpdate;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;


class WorkflowFormUpdateSite extends AbstractSite
{

    /**
     * @var WorkflowFormUpdateSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'workflow-update';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WorkflowFormUpdateSite::$site = $this;
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


        if ($status->formClassName !== '') {

            $workflowId = $statusChangeRow->workflowId;


            $form = new $status->formClassName($page);
            $form->workflowId = $workflowId;
            //$form->


        } else {


            $form = new WorkflowFormUpdate($page);
            $form->model = $model;
            $form->updateId = $statusChangeRow->workflowItemId;
            $form->redirectSite = clone(WorkflowItemSite::$site);
            $form->redirectSite->addParameter(new WorkflowParameter($statusChangeRow->workflowId));

        }

        $page->render();


    }

}