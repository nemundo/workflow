<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;

class ChangeWorkflowItem extends AbstractWorkflowItem
{

    public function getHtml()
    {

        $reader = new WorkflowStatusChangeReader();
        $reader->model->loadWorkflowStatus();
        //$reader->filter->andEqual($reader->model->workflowItemId,  $this->workflowItemId);


        $row = $reader->getRow();

        // changeId


        //$this->addHtml('text:'.$row->workflowStatus->workflowStatusText);

        return parent::getHtml();

    }

}