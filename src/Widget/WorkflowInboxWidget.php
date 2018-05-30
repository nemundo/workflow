<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Dev\App\Widget\AbstractWidget;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Login\Session\UserIdSession;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentPaginationReader;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Paranautik\Widget\ParanautikWidget;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Data\Usergroup\UsergroupListBox;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Design\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Dev\Application\Data\Application\ApplicationListBox;
use Nemundo\Workflow\Com\OpenClosedWorkflowListBox;
use Nemundo\Workflow\Data\Process\ProcessListBox;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class WorkflowInboxWidget extends AbstractHtmlContainerList  // AbstractWidget ParanautikWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Workflow Inbox';


        $reader = new UserAssignmentPaginationReader();
        $reader->model->loadWorkflow();
        $reader->model->workflow->loadWorkflowStatus();
        $reader->model->workflow->loadProcess();
        $reader->filter->andEqual($reader->model->userId, (new UserInformation())->getUserId());




        $table = new BootstrapClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Prozess');
        $header->addText($reader->model->workflow->workflowNumber->label);
        $header->addText($reader->model->workflow->subject->label);
        $header->addText($reader->model->workflow->workflowStatus->label);
        //$header->addText($workflowReader->model->closed->label);
        $header->addEmpty();


        foreach ($reader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($workflowRow->workflow->process->process);
            $row->addText($workflowRow->workflow->workflowNumber);
            $row->addText($workflowRow->workflow->subject);
            $row->addText($workflowRow->workflow->workflowStatus->workflowStatus);
            //$row->addYesNo($workflowRow->closed);

            /*
            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addSite($site);
*/

            //$row->addText($changeRow->user->displayName);
            //$row->addText($changeRow->dateTime->getShortDateTimeFormat());

            //$row->addText($changeRow->itemOrder);

            $site = $workflowRow->workflow->process->getProcessClassObject()->getApplicationSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($workflowRow->workflowId));
            $row->addClickableSite($site);

        }


        $pagination = new BootstrapModelPagination($this);
        $pagination->paginationReader = $reader;





        return parent::getHtml();
    }


}