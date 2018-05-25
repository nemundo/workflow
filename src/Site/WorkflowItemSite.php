<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Com\Html\Basic\H1;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\View\ModelView;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\WorkflowActionButton;
use Nemundo\Workflow\Com\WorkflowItemList;
use Nemundo\Workflow\Com\WorkflowModelView;
use Nemundo\Workflow\Com\WorkflowTitle;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\Workflow\WorkflowView;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeTable;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Schleuniger\Template\SchleunigerTemplate;

class WorkflowItemSite extends AbstractSite
{

    /**
     * @var WorkflowItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Item';
        $this->url = 'item';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        $this::$site = $this;
    }


    public function loadContent()
    {

        $page = new SchleunigerTemplate();

        $workflowId = (new WorkflowParameter())->getValue();

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowRow = $workflowReader->getRowById($workflowId);

        $application = $workflowRow->application->getApplicationTypeClassNameObject();

        $title = new H1($page);
        $title->content = 'app:' . $application->application;


        /*
        $title = new H1($page);
        $title->content = $workflowRow->workflowNumber . ':  ' . $workflowRow->workflowSubject;

        $title = new H1($page);
        $title->content = 'status:' . $workflowRow->workflowStatus->workflowStatus;*/

     /*   $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;*/


        //$view = new WorkflowView($page);
        //$view->dataId = $workflowId;


       /* $model = (new ModelFactory())->getModelByClassName($application->baseModelClassName);

        $view = new WorkflowModelView($page);
        $view->model = $model;
        $view->filter->andEqual($model->workflowId, $workflowId);


        $table = new WorkflowStatusChangeTable($page);
        $table->filter->andEqual($table->model->workflowId, $workflowRow->id);*/


        $workflow = new WorkflowItemList($page);
        $workflow->application = $application;
        $workflow->workflowId = $workflowRow->id;



        //$workflow->worklfowNumber = '';
        //$workflow->workflowTitle = '';
        //$workflow->workflowStatus = $workflowRow->workflowStatus->getWorkflowStatusClassObject();






        $actionButton = new WorkflowActionButton($page);
        $actionButton->workflowId = $workflowRow->id;


        $page->render();


    }


}