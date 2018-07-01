<?php

namespace Nemundo\Workflow\App\Task\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Task\Data\Task\TaskPaginationReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;

class TaskSite extends AbstractSite
{

    /**
     * @var TaskSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'Task';
        //$this->url = 'task';
        $this->title = 'Aufgaben';
        $this->url = 'aufgaben';
    }


    protected function registerSite()
    {
        TaskSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $title = new AdminTitle($page);
        $title->content = $this->title;


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Quelle');
        $header->addText('Aufgabe');
        $header->addText('Erledigen bis');
        $header->addText('Aufwand');
        $header->addText('Zuweisung an');
        $header->addText('Ersteller');
        $header->addText('Archiviert');


        $taskReader = new TaskPaginationReader();
        $taskReader->model->loadContentType();
        $taskReader->model->loadIdentificationType();
        $taskReader->model->loadUserCreated();
        $taskReader->paginationLimit = 50;


        $filter = new Filter();
        $filter->orEqual($taskReader->model->identificationId, (new UserInformation())->getUserId());
        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $filter->orEqual($taskReader->model->identificationId, $usergroupId);
        }

        $taskReader->filter->andFilter($filter);

        $taskReader->addOrder($taskReader->model->archive);
        $taskReader->addOrder($taskReader->model->dateTimeCreated, SortOrder::DESCENDING);


        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($table);

            if (!$taskRow->archive) {
                if ($taskRow->deadline !== null) {
                    $trafficLight = new DateTrafficLight($row);
                    $trafficLight->date = $taskRow->deadline;
                } else {
                    $row->addEmpty();
                }
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

            $row->addText($taskRow->timeEffort);


            $contentType = $taskRow->contentType->getContentTypeClassObject();
            $identificationType = $taskRow->identificationType->getIdentificationTypeClassObject();

            $row->addText($identificationType->getValue($taskRow->identificationId));


            $row->addText($taskRow->userCreated->displayName . ' ' . $taskRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());


            $row->addYesNo($taskRow->archive);

            $row->addClickableSite($contentType->getItemSite($taskRow->dataId));

        }


        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $taskReader;

        $page->render();

    }


}