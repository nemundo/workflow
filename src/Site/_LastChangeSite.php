<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangePaginationReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;

class LastChangeSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Last Workflow Changes';
        $this->url = 'last-change';
        $this->restricted=true;
        $this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Prozess');
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Benutzer');

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
            //$row->addText($changeRow->workflowStatus->workflowStatus . ': ' . $changeRow->workflowStatus->workflowStatusText);
            $row->addText($changeRow->workflowStatus->workflowStatusText);

            $row->addText($changeRow->user->displayName . ' ' . $changeRow->dateTime->getShortDateTimeLeadingZeroFormat());

            $site = $changeRow->workflow->process->getProcessClassObject()->getItemSite();
            $site->addParameter(new WorkflowParameter($changeRow->workflowId));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $changeReader;

        $page->render();

    }

}