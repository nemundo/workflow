<?php

namespace Nemundo\Workflow\App\Workflow\Com\StatusChange;


use Nemundo\Com\Html\Basic\Bold;
use Nemundo\Package\Bootstrap\Listing\BootstrapList;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;

class StatusChangeList extends BootstrapList
{

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {

        //$list = new BootstrapList($colLeft);


         $workflowItem = new WorkflowItem($this->workflowId);

        foreach ($workflowItem->getStatusChangeLog() as $workflowStatus) {
            $this->addText($workflowStatus->contentName);
            //addHyperlink($statusChangeRow->workflowStatus->contentType, '#' . $statusChangeRow->dataId);
        }

        $bold = new Bold();
        $bold->content = $workflowItem->getWorkflowStatus()->contentName;


        $this->addText($bold->getHtmlString());

        foreach ($workflowItem->getNextWorkflowStatusList() as $workflowStatus) {
            $this->addText($workflowStatus->name);
            //addHyperlink($statusChangeRow->workflowStatus->contentType, '#' . $statusChangeRow->dataId);
        }


        return parent::getHtml();
    }


}