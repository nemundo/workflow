<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;

class ChangeWorkflowItemView extends AbstractWorkflowItemView
{

    public function getHtml()
    {

        $changeEvent = new StatusChangeEvent();
        $changeEvent->workflowId = $this->workflowId;
        $changeEvent->workflowItemId = $this->workflowItemId;

        //$this->addHtml($this->workflowStatus->getStatusText($changeEvent));
        return parent::getHtml();

    }

}