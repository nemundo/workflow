<?php

namespace Nemundo\Workflow\App\Task\Site\Admin;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Task\Data\Task\TaskPaginationReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskPaginationTable;

class TaskAdminSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Task Admin';
        $this->url = 'task-admin';
    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        //new TaskPaginationTable($page);

        $title = new AdminTitle($page);
        $title->content = $this->title;



        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Task');
        $header->addText('Assign to');



        $taskReader = new TaskPaginationReader();
        $taskReader->model->loadIdentificationType();
        $taskReader->model->loadUserCreated();
        $taskReader->paginationLimit = 50;


        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($taskRow->task);

            $identificationType = $taskRow->identificationType->getIdentificationTypeClassObject();
            $row->addText($identificationType->getValue($taskRow->identificationId));


        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $taskReader;




        $page->render();


    }

}