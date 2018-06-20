<?php

namespace Nemundo\Workflow\Com\Item;


class ChangeWorkflowItemView extends AbstractWorkflowItemView
{

    public function getHtml()
    {

        $this->addHtml($this->workflowStatus->getStatusText());
        return parent::getHtml();

    }

}