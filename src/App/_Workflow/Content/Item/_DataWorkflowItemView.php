<?php

namespace Nemundo\Workflow\App\Workflow\Content\Item;


use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Com\View\WorkflowModelView;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;

class DataWorkflowItemView extends AbstractWorkflowViewView
{

    public function getHtml()
    {

        $reader = new WorkflowStatusChangeReader();
        $reader->model->loadWorkflowStatus();
        $reader->filter->andEqual($reader->model->dataId, $this->dataId);

        $row = $reader->getRow();

        /** @var AbstractDataWorkflowStatus $workflowStatus */
        $workflowStatus = $row->workflowStatus->getWorkflowStatusClassObject();

        //(new Debug())->write($workflowStatus);

        //$p = new Paragraph($this);
        //$p->content = $workflowStatus->modelClassName;

        if ($workflowStatus->modelClass !== null) {

            $model = (new ModelFactory())->getModelByClassName($workflowStatus->modelClass);

            $view = new WorkflowModelView($this);
            $view->model = $model;
            $view->dataId = $this->dataId;

        }

        return parent::getHtml();

    }

}