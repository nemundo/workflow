<?php

namespace Nemundo\Workflow\App\Task\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
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
        $header->addText('Archiviert');


        $taskReader = new TaskPaginationReader();
        $taskReader->model->loadContentType();
        $taskReader->model->loadIdentificationType();

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

            $row->addText($taskRow->timeEffort);


            $contentType = $taskRow->contentType->getContentTypeClassObject();
            $identificationType = $taskRow->identificationType->getIdentificationTypeClassObject();

            $row->addText($identificationType->getValue($taskRow->identificationId));

            $row->addYesNo($taskRow->archive);

            $row->addClickableSite($contentType->getItemSite($taskRow->dataId));

        }


        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $taskReader;


        //new TaskTable($page);


        $page->render();

    }


}