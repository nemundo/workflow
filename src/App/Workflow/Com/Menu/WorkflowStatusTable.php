<?php

namespace Nemundo\Workflow\App\Workflow\Com\Menu;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Content\Type\Workflow\AbstractWorkflowStatus;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\FontAwesome\Icon\ArrowRightIcon;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;

class WorkflowStatusTable extends AbstractHtmlContainerList
{

    /**
     * @var AdminTable
     */
    private $table;

    protected function loadCom()
    {
        $this->table = new AdminTable($this);
    }


    public function addLogWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {

        $row = new TableRow($this->table);

        new CheckIcon($row);

        //$row->addText($workflowStatus->contentName);
        $row->addText($workflowStatus->getSubject());

        $row->addText($workflowStatus->userCreated->displayName);
        $row->addText($workflowStatus->dateTimeCreated->getShortDateLeadingZeroFormat());

    }


    public function addActiveWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {


        $row = new TableRow($this->table);

        new ArrowRightIcon($row);

        $row->addBoldText($workflowStatus->contentName);

        $row->addEmpty();
        $row->addEmpty();


    }


    public function addNextWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {


        $row = new TableRow($this->table);

        $row->addEmpty();
        $row->addText($workflowStatus->contentName);
        $row->addEmpty();
        $row->addEmpty();
    }

}