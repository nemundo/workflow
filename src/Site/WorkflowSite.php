<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Directory\TextDirectory;
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
use Nemundo\Workflow\Com\Process\ProcessDropdown;
use Nemundo\Workflow\Data\Process\ProcessListBox;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Inbox\WorkflowInboxTable;
use Nemundo\Workflow\Inbox\WorkflowStatus;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Usergroup\WorkflowUsergroup;


class WorkflowSite extends AbstractSite
{

    /**
     * @var WorkflowSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'Workflow';
        $this->url = 'workflow-app';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new WorkflowUsergroup());

        //$this->menuActive = false;

        new WorkflowStatusChangeSite($this);
        new WorkflowSubscriptionSite($this);
        new WorkflowItemSite($this);
        new WorkflowFormUpdateSite($this);
        new WorkflowDraftFreigabeSite($this);
        new WorkflowNewSite($this);

    }


    protected function registerSite()
    {

        WorkflowSite::$site = $this;

    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new ProcessDropdown($page);


        /*$dropdown = new BootstrapDropdown($page);

        $processReader = new ProcessReader();

        foreach ($processReader->getData() as $processRow) {

            $site = clone(WorkflowNewSite::$site);
            $site->title = $processRow->process;
            $site->addParameter(new ProcessParameter($processRow->id));

            $dropdown->addSite($site);
        }


        /*
        $dropdown = new BootstrapDropdown($page);
        $dropdown->addSite(KvpNewSite::$site);
        $dropdown->addSite(ChangeRequestNewSite::$site);
        $dropdown->addSite(AbweichungsreportNewSite::$site);
*/

        $searchForm = new SearchForm($page);

        $row = new BootstrapFormRow($searchForm);

        $processListBox = new ProcessListBox($row);
        $processListBox->submitOnChange = true;
        $processListBox->value = $processListBox->getValue();

        $statusListBox = new OpenClosedWorkflowListBox($row);

        $userListBox = new UserListBox($row);
        $userListBox->label = 'User Assignment';
        $userListBox->submitOnChange = true;
        $userListBox->value = $userListBox->getValue();

        $usergroupListBox = new UsergroupListBox($row);
        $usergroupListBox->label = 'Usergroup Assignment';
        $usergroupListBox->submitOnChange = true;
        $usergroupListBox->value = $usergroupListBox->getValue();


        /*
        $usergroupId = $usergroupAssignmentListBox->getValue();
        if ($usergroupId !== '') {


            $reader = new UsergroupAssignmentReader();
            $reader->model->loadWorkflow();
            $reader->filter->andEqual($reader->model->usergroupId, $usergroupId);

            foreach ($reader->getData() as $assignmentRow) {

                (new Debug())->write($assignmentRow->workflow->subject);

            }


        }*/





        $table = new WorkflowInboxTable($page);

        if ($statusListBox->getValue() == 1) {
            $table->status =WorkflowStatus::SHOW_OPEN;
        }

        if ($statusListBox->getValue() == 2) {
            $table->status =WorkflowStatus::SHOW_CLOSED;
        }

        if ($processListBox->getValue() !== '') {
           $table->addProcessIdFilter($processListBox->getValue());
        }

        if ($usergroupListBox->getValue() !== '') {
            $table->addUsergroupIdFilter($usergroupListBox->getValue());
        }

        if ($userListBox->getValue() !== '') {
            $table->addUserIdFilter($userListBox->getValue());
        }

        /*
        $workflowReader = new WorkflowPaginationReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadProcess();
        $workflowReader->paginationLimit = 30;
        $workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);

        if ($processListBox->getValue() !== '') {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $processListBox->getValue());
        }

        if (($statusListBox->getValue() == 1) || ($statusListBox->getValue() == '')) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($statusListBox->getValue() == 2) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        }


        $table = new BootstrapClickableTable($page);
        $table->smallTable = true;
        $table

        $header = new TableHeader($table);
        $header->addText('Prozess');
        $header->addText($workflowReader->model->workflowNumber->label);
        $header->addText($workflowReader->model->subject->label);
        $header->addText($workflowReader->model->workflowStatus->label);
        $header->addText($workflowReader->model->closed->label);
        $header->addText($workflowReader->model->deadline->label);
        $header->addText('Assign to (User)');
        $header->addText('Assign to (Usergroup)');
        $header->addEmpty();


        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($workflowRow->process->process);
            $row->addText($workflowRow->workflowNumber);
            $row->addText($workflowRow->subject);
            $row->addText($workflowRow->workflowStatus->workflowStatus);
            $row->addYesNo($workflowRow->closed);

           if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }


            // User
            $reader = new UserAssignmentReader();
            $reader->model->loadUser();
            $reader->filter->andEqual($reader->model->workflowId, $workflowRow->id);

            $user = new TextDirectory();
            foreach ($reader->getData() as $assignmentRow) {
                $user->addValue($assignmentRow->user->displayName);
            }
            $row->addText($user->getTextWithSeperator());

            // Usergroup
            $reader = new UsergroupAssignmentReader();
            $reader->model->loadUsergroup();
            $reader->filter->andEqual($reader->model->workflowId, $workflowRow->id);

            $usergroup = new TextDirectory();
            foreach ($reader->getData() as $assignmentRow) {
                $usergroup->addValue($assignmentRow->usergroup->usergroup);
            }
            $row->addText($usergroup->getTextWithSeperator());

            /*
            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addSite($site);
*/

            //$row->addText($changeRow->user->displayName);
            //$row->addText($changeRow->dateTime->getShortDateTimeFormat());

            //$row->addText($changeRow->itemOrder);

 /*           $site = $workflowRow->process->getProcessClassObject()->getApplicationSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);

        }


        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $workflowReader;*/


        $page->render();


    }

}