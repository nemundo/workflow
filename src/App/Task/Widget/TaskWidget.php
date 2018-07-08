<?php

namespace Nemundo\Workflow\App\Task\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Site\TaskSite;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;

class TaskWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Aufgaben';
        $this->widgetId = '';
    }


    protected function loadCom()
    {

        $this->widgetTitle = 'Aufgaben';
        $this->widgetSite = TaskSite::$site;

        parent::loadCom();

    }

    public function getHtml()
    {

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Quelle');
        $header->addText('Aufgabe');
        $header->addText('Erledigen bis');
        //$header->addText('Aufwand');


        $taskReader = new TaskReader();
        $taskReader->model->loadContentType();
        $taskReader->filter->andEqual($taskReader->model->archive, false);
        $taskReader->addOrder($taskReader->model->dateTimeCreated, SortOrder::DESCENDING);


        $filter = new Filter();
        $filter->orEqual($taskReader->model->identificationId, (new UserInformation())->getUserId());
        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $filter->orEqual($taskReader->model->identificationId, $usergroupId);
        }

        $taskReader->filter->andFilter($filter);


        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($table);

            if ($taskRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $taskRow->deadline;
            } else {
                $row->addEmpty();
            }

            $row->addText($taskRow->contentType->contentType);
            $row->addText($taskRow->task);

            if ($taskRow->deadline !== null) {
                $row->addText($taskRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            //$row->addText($taskRow->timeEffort);


            $contentType = $taskRow->contentType->getContentTypeClassObject();

            $site = $contentType->getItemSite($taskRow->dataId);
            if ($site !== null) {
                $row->addClickableSite($site);
            }

        }


        return parent::getHtml();

    }

}