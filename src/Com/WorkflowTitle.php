<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;

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
        $workflowReader->model->loadUser();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $title = new H1($this);
        $title->content = $workflowRow->workflowNumber . ': ' . $workflowRow->subject;

        $p = new Paragraph($this);
        $p->content = 'Status: ' . $workflowRow->workflowStatus->workflowStatus;

        $p = new Paragraph($this);
        $p->content = 'Status Text: ' . $workflowRow->workflowStatus->workflowStatusText;

        $p = new Paragraph($this);
        $p->content = 'Ersteller: ' . $workflowRow->user->displayName;


        return parent::getHtml();

    }

}