<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;

use Nemundo\Core\Random\RandomUniqueId;
use Nemundo\Model\Admin\ModelAdmin;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Action\ActionUrlParameter;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeValue;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeCount;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;

class DataListWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $count = new WorkflowStatusChangeCount();
        $count->filter->andEqual($count->model->workflowStatusId, $this->workflowStatus->id);
        $count->filter->andEqual($count->model->workflowId, $this->workflowId);

        if ($count->getCount() == 0) {
            $change = new WorkflowStatusChangeBuilder();
            $change->workflowStatus = $this->workflowStatus;
            $change->workflowId = $this->workflowId;
            $change->workflowItemId = (new RandomUniqueId())->getUniqueId();
            $change->draft = true;
            $change->changeStatus();
        }


        $value = new WorkflowStatusChangeValue();
        $value->filter->andEqual($count->model->workflowStatusId, $this->workflowStatus->id);
        $value->filter->andEqual($count->model->workflowId, $this->workflowId);
        $value->field = $value->model->workflowItemId;
        $dataId = $value->getValue();


        $admin = new ModelAdmin($this);
        $admin->showViewButton = false;

        /** @var AbstractWorkflowBaseModel $model */
        $model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelListClass);

        $admin->model = $model;
        //$admin->filter->andEqual($model->workflowId, $this->workflowId);
        $admin->filter->andEqual($model->dataId, $dataId);
        $admin->model->dataId->defaultValue = $dataId;

        //$admin->model->workflowId->defaultValue = $this->workflowId;

        /*
        if ((new ActionUrlParameter())->getValue() == 'index') {
            $btn = new DraftReleaseButton($this);
            $btn->workflowId = $this->workflowId;
            $btn->redirectSite = $this->redirectSite;

        }*/


        return parent::getHtml();

    }

}