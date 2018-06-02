<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangePaginationReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class LastChangeSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Last Changes';
        $this->url = 'last-change';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $table = new BootstrapClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Prozess');
        $header->addText('No');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Ersteller');


        $changeReader = new WorkflowStatusChangePaginationReader();
        $changeReader->model->loadWorkflow();
        $changeReader->model->workflow->loadProcess();
        $changeReader->model->loadWorkflowStatus();
        $changeReader->model->loadUser();
        $changeReader->addOrder($changeReader->model->itemOrder, SortOrder::DESCENDING);
        $changeReader->paginationLimit = 30;

        foreach ($changeReader->getData() as $changeRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($changeRow->workflow->process->process);
            $row->addText($changeRow->workflow->workflowNumber);
            $row->addText($changeRow->workflow->subject);
            $row->addText($changeRow->workflowStatus->workflowStatus);
            $row->addText($changeRow->user->displayName . ' ' . $changeRow->dateTime->getShortDateTimeLeadingZeroFormat());

            $site = $changeRow->workflow->process->getProcessClassObject()->getApplicationSite();
            $site->addParameter(new WorkflowParameter($changeRow->workflowId));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $changeReader;

        $page->render();

    }

}