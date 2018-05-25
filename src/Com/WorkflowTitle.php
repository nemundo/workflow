<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Schleuniger\Com\Title\SchleunigerTitle;

class WorkflowTitle extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowRow =$workflowReader->getRowById($this->workflowId);

        $title = new SchleunigerTitle($this);
        $title->content = $workflowRow->workflowNumber . ': ' . $workflowRow->workflowSubject;

        $p = new Paragraph($this);
        $p->content = 'Status: '.$workflowRow->workflowStatus->workflowStatus;


        return parent::getHtml();

    }


}