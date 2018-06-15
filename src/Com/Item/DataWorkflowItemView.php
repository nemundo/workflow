<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Com\View\WorkflowModelView;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

class DataWorkflowItemView extends AbstractWorkflowItemView
{

    public function getHtml()
    {

        $reader = new WorkflowStatusChangeReader();
        $reader->model->loadWorkflowStatus();
        $reader->filter->andEqual($reader->model->workflowItemId, $this->workflowItemId);

        $row = $reader->getRow();

        /** @var AbstractDataWorkflowStatus $workflowStatus */
        $workflowStatus = $row->workflowStatus->getWorkflowStatusClassObject();

        //(new Debug())->write($workflowStatus);

        //$p = new Paragraph($this);
        //$p->content = $workflowStatus->modelClassName;

        if ($workflowStatus->modelClassName !== null) {

            $model = (new ModelFactory())->getModelByClassName($workflowStatus->modelClassName);

            $view = new WorkflowModelView($this);
            $view->model = $model;
            $view->dataId = $this->workflowItemId;

        }

        return parent::getHtml();

    }

}