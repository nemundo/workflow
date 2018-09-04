<?php

namespace Nemundo\Workflow\App\Assignment\Widget;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentReader;
use Nemundo\Workflow\App\Assignment\Site\AssignmentSite;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;


class AssignmentWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Aufgaben (Assignment)';
        $this->widgetSite = AssignmentSite::$site;
    }


    public function getHtml()
    {

        $assignmentReader = new AssignmentReader();


        $filter = new Filter();
        foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

            foreach ($identification->getUserIdList() as $value) {
                $filter->orEqual($assignmentReader->model->assignment->identificationId, $value);
            }

        }


        $assignmentReader->filter->andFilter($filter);
        $assignmentReader->filter->andEqual($assignmentReader->model->archive, false);


        $assignmentReader->addOrder($assignmentReader->model->id, SortOrder::DESCENDING);

        //$assignmentReader->limit = 20;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Quelle');
        $header->addText('Betreff');
        $header->addText('Nachricht');
        $header->addText('Erledigen bis');

        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);

            if ($assignmentRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $assignmentRow->deadline;
            } else {
                $row->addEmpty();
            }

            $row->addText($assignmentRow->contentType->contentType);
            $row->addText($assignmentRow->subject);
            $row->addText($assignmentRow->message);

            if ($assignmentRow->deadline !== null) {
                $row->addText($assignmentRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $site = $assignmentRow->contentType->getContentTypeClassObject()->getItemSite($assignmentRow->dataId);
            $row->addClickableSite($site);

        }

        return parent::getHtml();

    }

}