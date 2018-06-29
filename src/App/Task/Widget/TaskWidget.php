<?php

namespace Nemundo\Workflow\App\Task\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;

class TaskWidget extends AbstractAdminWidget
{


    protected function loadCom()
    {
        parent::loadCom();

        $this->widgetTitle = 'Aufgaben';

    }

    public function getHtml()
    {


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Aufgabe');
        $header->addText('Erledigen bis');
        $header->addText('Aufwand');


        $taskReader = new TaskReader();
        $taskReader->model->loadContentType();

        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($table);

            if ($taskRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $taskRow->deadline;
            } else {
                $row->addEmpty();
            }


            $row->addText($taskRow->task);

            if ($taskRow->deadline !== null) {
                $row->addText($taskRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($taskRow->timeEffort);


            $contentType = $taskRow->contentType->getContentTypeClassObject();

            $row->addClickableSite($contentType->getItemSite($taskRow->dataId));


        }


        return parent::getHtml();

    }

}