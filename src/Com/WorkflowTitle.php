<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;

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
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();

        $title = new H1($this);
        $title->content = $workflowRow->workflowNumber . ': ' . $workflowRow->subject;

        $link = new Hyperlink($this);
        $link->content = 'Zum Workflow';
        $link->site = clone($process->site);
        $link->site->addParameter(new WorkflowParameter($this->workflowId));


        $p = new Paragraph($this);
        $p->content = 'Status: ' . $workflowRow->workflowStatus->workflowStatus;

        $p = new Paragraph($this);
        $p->content = 'Status Text: ' . $workflowRow->workflowStatus->workflowStatusText;

        $p = new Paragraph($this);
        $p->content = 'Ersteller: ' . $workflowRow->user->displayName;


        return parent::getHtml();

    }

}