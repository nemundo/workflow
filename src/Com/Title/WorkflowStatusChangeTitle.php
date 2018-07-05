<?php

namespace Nemundo\Workflow\Com\Title;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class WorkflowStatusChangeTitle extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;





    public function getHtml()
    {

        $workflowItem = new WorkflowItem($this->workflowId);

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $workflowItem->getProcess()->name;


        $workflowTitle = $workflowItem->subject;

        if ($workflowItem->workflowNumber !== '') {
            $workflowTitle = $workflowItem->workflowNumber . ': ' . $workflowTitle;
        }

        $title = new AdminTitle($this);
        $title->content = $workflowTitle;


        /*
        $table = new AdminLabelValueTable($this);

        /*
        if ($workflowRow->deadline !== null) {
            $table->addLabelValue('Erledigen bis', $workflowRow->deadline->getShortDateLeadingZeroFormat());
        }*/

       /* $table->addLabelValue('Ersteller', $workflowItem->userRow->displayName . ' ' . $workflowRow->dateTime->getShortDateTimeLeadingZeroFormat());
        $table->addLabelValue('Letzte Änderung', $workflowRow->userModified->displayName . ' ' . $workflowRow->dateTimeModified->getShortDateTimeLeadingZeroFormat());
        //$table->addLabelValue('Status', $workflowRow->workflowStatus->workflowStatus);
        $table->addLabelValue('Status', $workflowItem->getStatus());
        $table->addLabelValue('Status Text', $workflowRow->workflowStatus->workflowStatusText);
*/




        return parent::getHtml();

    }


}