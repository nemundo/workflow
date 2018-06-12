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

class DataListStatusChangeSite extends AbstractSite
{

    /**
     * @var DataListStatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        DataListStatusChangeSite::$site = $this;
    }


    public function loadContent()
    {

        $workflowStatusId = (new WorkflowStatusParameter())->getValue();

        $workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);

        /** @var AbstractWorkflowStatus|AbstractDataListWorkflowStatus|AbstractFormWorkflowStatus $workflowStatus */
        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();


        if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {


            $change = new WorkflowStatusChangeBuilder();
            $change->workflowStatus = $workflowStatus;
            $change->workflowId = $workflowId;
            $change->changeStatus();


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



    }

}