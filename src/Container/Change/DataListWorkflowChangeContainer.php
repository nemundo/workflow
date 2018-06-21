<?php

namespace Nemundo\Workflow\Container\Change;

use Nemundo\Model\Admin\ModelAdmin;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Action\ActionUrlParameter;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeCount;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;

class DataListWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $count = new WorkflowStatusChangeCount();
        $count->filter->andEqual($count->model->workflowStatusId, $this->workflowStatus->workflowStatusId);
        $count->filter->andEqual($count->model->workflowId, $this->workflowId);

        if ($count->getCount() == 0) {
            $change = new WorkflowStatusChangeBuilder();
            $change->workflowStatus = $this->workflowStatus;
            $change->workflowId = $this->workflowId;
            $change->draft = true;
            $change->changeStatus();
        }

        $admin = new ModelAdmin($this);
        $admin->showViewButton = false;

        /** @var AbstractWorkflowBaseModel $model */
        $model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelListClassName);

        $admin->model = $model;
        $admin->filter->andEqual($model->workflowId, $this->workflowId);
        $admin->model->workflowId->defaultValue = $this->workflowId;

        /*
        if ((new ActionUrlParameter())->getValue() == 'index') {
            $btn = new DraftReleaseButton($this);
            $btn->workflowId = $this->workflowId;
            $btn->redirectSite = $this->redirectSite;

        }*/


        return parent::getHtml();

    }

}