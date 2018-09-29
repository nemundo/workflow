<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangePaginationReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangePaginationReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;

class StatusChangeLogSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Workflow Status Changes Log';
        $this->url = 'last-change';
        //$this->restricted=true;
        //$this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

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
        $header->addText('Status Text');
        $header->addText('Assign To');
        $header->addText('Ersteller');

        $changeReader = new StatusChangePaginationReader();  // new WorkflowStatusChangePaginationReader();
        $changeReader->model->loadWorkflow();
        $changeReader->model->workflow->loadProcess();
        $changeReader->model->loadWorkflowStatus();
        $changeReader->model->loadUser();
        $changeReader->addOrder($changeReader->model->itemOrder, SortOrder::DESCENDING);
        $changeReader->paginationLimit = 30;

        foreach ($changeReader->getData() as $changeRow) {

            $row = new BootstrapClickableTableRow($table);


            /** @var AbstractWorkflowStatus $workflowStatus */
            $workflowStatus = $changeRow->workflowStatus->getContentTypeClassObject();

            $process = $changeRow->workflow->process->getProcessClassObject();

            $row->addText($changeRow->workflow->process->process);
            $row->addText($changeRow->workflow->workflowNumber);


            //$row->addText($changeRow->workflow->subject);
            $row->addText($process->getSubject($changeRow->workflowId));

            //$row->addText($changeRow->workflowStatus->workflowStatus . ': ' . $changeRow->workflowStatus->workflowStatusText);
            $row->addText($changeRow->workflowStatus->contentType);


            $row->addText($workflowStatus->getStatusText($changeRow->dataId));

            $row->addText($changeRow->assignment->getValue());


            $row->addText($changeRow->user->displayName . ' ' . $changeRow->dateTime->getShortDateTimeLeadingZeroFormat());

            //$site = $changeRow->workflow->process->getProcessClassObject()->getItemSite();
            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($changeRow->workflowId));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $changeReader;

        $page->render();

    }

}