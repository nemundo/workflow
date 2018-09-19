<?php

namespace Nemundo\Workflow\App\Workflow\Widget;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\App\Workflow\Site\WorkflowSite;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;



class WorkflowWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Workflow';
        $this->widgetId = '';
        $this->widgetSite = WorkflowSite::$site;
    }


    public function getHtml()
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);

        $workflowReader->limit = 20;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Prozess');
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Erledigen bis');


        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);

            if ($workflowRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $workflowRow->deadline;
            } else {
                $row->addEmpty();
            }

            $row->addText($workflowRow->process->process);
            $row->addText($workflowRow->workflowNumber);
            $row->addText($workflowRow->subject);

            $row->addText($workflowRow->workflowStatus->workflowStatus);

            if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $process = $workflowRow->process->getProcessClassObject();
            $site = $process->getItemSite($workflowRow->dataId);
            $row->addClickableSite($site);

        }

        return parent::getHtml();

    }

}