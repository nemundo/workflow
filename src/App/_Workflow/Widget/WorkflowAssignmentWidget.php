<?php

namespace Nemundo\Workflow\App\Workflow\Widget;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;
use Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Site\WorkflowSite;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;


class WorkflowAssignmentWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Aufgaben (Workflow Assignment)';
        $this->widgetId = '';
        $this->widgetSite = WorkflowSite::$site;
    }


    public function getHtml()
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowReader->model->loadWorkflowStatus();


        $filter = new Filter();
        foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

            foreach ($identification->getUserIdList() as $value) {
                $filter->orEqual($workflowReader->model->assignment->identificationId, $value);
            }

            //(new Debug())->write($identification);
            //$filter->orEqual($workflowReader->model->assignment->identificationId, $value);


        }


        /*
        $filter = new Filter();
        $identificationTypeReader = new IdentificationTypeReader();
        foreach ($identificationTypeReader->getData() as $identificationTypeRow) {

            $identificationType = $identificationTypeRow->getIdentificationTypeClassObject();
            foreach ($identificationType->getIdentificationIdList() as $value) {
                $filter->orEqual($workflowReader->model->identificationId, $value);
            }

        }*/

        $workflowReader->filter->andFilter($filter);


        $workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);

        $workflowReader->limit = 20;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Quelle/Prozess');
        //$header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Status Text');
        $header->addText('Erledigen bis');


        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);


            $process = $workflowRow->process->getProcessClassObject();

            /** @var AbstractWorkflowStatus $workflowStatus */
            $workflowStatus = $workflowRow->workflowStatus->getContentTypeClassObject();

            if ($workflowRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $workflowRow->deadline;
            } else {
                $row->addEmpty();
            }

            //$row->addText($workflowRow->process->process);

            $row->addText($process->getSource($workflowRow->id));


            $row->addText($workflowRow->workflowNumber.' '.$workflowRow->subject);
            //$row->addText($workflowRow->subject);


            $row->addText($workflowRow->workflowStatus->contentType);


            // last dataId
            $row->addEmpty();
            //$row->addText($workflowStatus->getStatusText($workflowRow->da));


            if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }


            $site = $process->getItemSite($workflowRow->dataId);
            $row->addClickableSite($site);

        }

        return parent::getHtml();

    }

}