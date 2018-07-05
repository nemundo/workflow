<?php

namespace Nemundo\Workflow\App\Workflow\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;


class WorkflowWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Workflow';
        $this->widgetId = '';
    }


    public function getHtml()
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        //$header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Nachricht');
        $header->addText('Erledigen bis');


        foreach ($workflowReader->getData() as $workflowRow) {


            $row = new BootstrapClickableTableRow($table);

            $number = $workflowRow->workflowNumber;  // . ' (' . $workflowRow->process->process . ')';

            //$statusText = $workflowRow->workflowStatus->workflowStatusText;
            /* $statusText = $workflowRow->workflowStatus->workflowStatus;





             if ($workflowRow->deadline !== null) {
                 $trafficLight = new DateTrafficLight($row);
                 $trafficLight->date = $workflowRow->deadline;
             } else {
                 $row->addEmpty();
             }

             $workflowItem = new WorkflowItem($workflowRow->id);*/

            $row->addText($workflowRow->workflowNumber);
            $row->addText($workflowRow->subject);

            /*   $row->addText($workflowItem->getTitle());
               //$row->addText($number);
               //$row->addText($workflowRow->subject);
               $row->addText($statusText);


               $changeEvent = new StatusChangeEvent();
               $changeEvent->workflowId = $workflowRow->id;

               $row->addText($workflowItem->workflowStatus->getStatusText($changeEvent));

               if ($workflowRow->deadline !== null) {
                   $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
               } else {
                   $row->addEmpty();
               }*/


            $process = $workflowRow->process->getProcessClassObject();  //->getItemSite();

            $row->addText($process->name);


            $site = $process->getItemSite($workflowRow->dataId);  // getItemSite();
            //   $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);

        }

        return parent::getHtml();

    }

}