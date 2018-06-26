<?php

namespace Nemundo\Workflow\Com\Title;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;


// WorkflowHeader
class WorkflowTitle extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {

        $workflowItem = new WorkflowItem($this->workflowId);


        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadUser();
        $workflowReader->model->loadUserModified();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $process->process;

        $workflowTitle = $workflowRow->subject;

        if ($workflowRow->workflowNumber !== '') {
            $workflowTitle = $workflowRow->workflowNumber . ': ' . $workflowTitle;
        }

        $title = new AdminTitle($this);
        $title->content = $workflowTitle;  // $workflowRow->workflowNumber . ': ' . $workflowRow->subject;

        /*$link = new Hyperlink($this);
        $link->content = 'Zum Workflow';
        $link->site = clone($process->site);
        $link->site->addParameter(new WorkflowParameter($this->workflowId));*/

        $table = new AdminLabelValueTable($this);

        if ($workflowRow->deadline !== null) {
            $table->addLabelValue('Erledigen bis', $workflowRow->deadline->getShortDateLeadingZeroFormat());
        }

        $table->addLabelValue('Ersteller', $workflowRow->user->displayName . ' ' . $workflowRow->dateTime->getShortDateTimeLeadingZeroFormat());
        $table->addLabelValue('Letzte Änderung', $workflowRow->userModified->displayName . ' ' . $workflowRow->dateTimeModified->getShortDateTimeLeadingZeroFormat());
        //$table->addLabelValue('Status', $workflowRow->workflowStatus->workflowStatus);
        $table->addLabelValue('Status', $workflowItem->getStatus());
        //$table->addLabelValue('Status Text', $workflowRow->workflowStatus->workflowStatusText);


        return parent::getHtml();

    }

}