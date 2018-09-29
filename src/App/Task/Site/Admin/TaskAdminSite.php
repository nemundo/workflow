<?php

namespace Nemundo\Workflow\App\Task\Site\Admin;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
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
        $header->addText('Type');
        $header->addText('Source');
        $header->addText('Task');
        $header->addText('Assign to');
        $header->addText('Deadline');
        $header->addText('Creator');
        $header->addText('Date/Time');

        $taskReader = new TaskPaginationReader();
        $taskReader->model->loadContentType();
        $taskReader->model->loadIdentificationType();
        $taskReader->model->loadUserCreated();
        $taskReader->addOrder($taskReader->model->dateTimeCreated, SortOrder::DESCENDING);
        $taskReader->paginationLimit = 50;

        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($taskRow->contentType->contentType);
            $row->addText($taskRow->source);
            $row->addText($taskRow->task);

            $identificationType = $taskRow->identificationType->getIdentificationTypeClassObject();

            if ($identificationType !== null) {
                $row->addText($identificationType->getValue($taskRow->identificationId));
            }


            if ($taskRow->deadline !== null) {
                $row->addText($taskRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($taskRow->userCreated->displayName);
            $row->addText($taskRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $taskReader;


        $page->render();


    }

}