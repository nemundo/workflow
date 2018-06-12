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
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeCount;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
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


        if ($workflowStatus->isObjectOfClass(AbstractDataWorkflowStatus::class)) {

            $page = (new DefaultTemplateFactory())->getDefaultTemplate();

            $title = new WorkflowTitle($page);
            $title->workflowId = $workflowId;


            /*
            $link = new Hyperlink($page);
            $link->content = 'Zum Workflow';
            $link->site = clone(WorkflowItemSite::$site);
            $link->site->addParameter($workflowParameter);*/


            $h2 = new H2($page);
            $h2->content = $workflowStatus->workflowStatus;

            $form = new WorkflowForm($page);
            $form->workflowStatus = $workflowStatus;
            $form->workflowId = $workflowId;
            $form->redirectSite = clone(WorkflowItemSite::$site);
            $form->redirectSite->addParameter($workflowParameter);

            $page->render();

        }


        if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {

            $count = new WorkflowStatusChangeCount();
            $count->filter->andEqual($count->model->workflowStatusId, $workflowStatusId);
            $count->filter->andEqual($count->model->workflowId, $workflowId);

            if ($count->getCount() ==  0) {
                $change = new WorkflowStatusChangeBuilder();
                $change->workflowStatus = $workflowStatus;
                $change->workflowId = $workflowId;
                $change->changeStatus();
            }


            $page = (new DefaultTemplateFactory())->getDefaultTemplate();

            $title = new WorkflowTitle($page);
            $title->workflowId = $workflowId;


            $h2 = new H2($page);
            $h2->content = $workflowStatus->workflowStatus;


            $admin = new ModelAdmin($page);

            /** @var AbstractWorkflowBaseModel $model */
            $model = (new ModelFactory())->getModelByClassName($workflowStatus->modelListClassName);

            $admin->model = $model;
            $admin->filter->andEqual($model->workflowId, $workflowId);
            $admin->model->workflowId->defaultValue = $workflowId;

            $page->render();

        }


        if ($workflowStatus->isObjectOfClass(AbstractFormWorkflowStatus::class)) {


            /*
            $change = new WorkflowStatusChangeBuilder();
            $change->workflowStatus = $workflowStatus;
            $change->workflowId = $workflowId;
            $change->changeStatus();*/


            $page = (new DefaultTemplateFactory())->getDefaultTemplate();

            $title = new WorkflowTitle($page);
            $title->workflowId = $workflowId;

            $h2 = new H2($page);
            $h2->content = $workflowStatus->workflowStatus;


            $form = new $workflowStatus->formClassName($page);
            $form->redirectSite = clone(WorkflowItemSite::$site);
            $form->redirectSite->addParameter($workflowParameter);


            $page->render();

        }


        /*
        $form = null;
        if ($workflowStatus->formClassName !== null) {

            $workflowStatus->draftMode = true;
            $workflowStatus->runWorkflow($workflowId);

            $form = new $workflowStatus->formClassName($page);
            $form->workflowId = $workflowId;

        } else {



        }*/


        // Action Panel Redirect
        /*if ($workflowStatus->actionPanelClassName !== null) {

            $workflowStatus->draftMode = true;
            $statusChangeId = $workflowStatus->runWorkflow($workflowId);

            $site = clone(WorkflowActionPanelSite::$site);
            $site->addParameter(new WorkflowStatusChangeParameter($statusChangeId));
            $site->redirect();

        }*/


        if ($workflowStatus->isObjectOfClass(AbstractChangeWorkflowStatus::class)) {

            //$workflowStatus->runWorkflow($workflowId);

            $builder = new WorkflowStatusChangeBuilder();
            $builder->workflowStatus = $workflowStatus;
            $builder->workflowId = $workflowId;
            $builder->changeStatus();

            (new UrlReferer())->redirect();

        }

    }

}