<?php

namespace Nemundo\Workflow\Com\Item;


class ChangeWorkflowItemView extends AbstractWorkflowItemView
{

    public function getHtml()
    {

        $this->addHtml($this->workflowStatus->workflowStatusText);

        return parent::getHtml();

    }

}