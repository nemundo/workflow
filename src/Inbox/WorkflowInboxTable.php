<?php

namespace Nemundo\Workflow\Inbox;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentModel;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentModel;
use Nemundo\Workflow\Data\Workflow\WorkflowCount;
use Nemundo\Workflow\Data\Workflow\WorkflowModel;
use Nemundo\Workflow\Inbox\WorkflowInboxTrait;
use Nemundo\Workflow\Process\AbstractProcess;
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
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Usergroup\WorkflowUsergroup;


class WorkflowInboxTable extends AbstractHtmlContainerList
{

    use WorkflowInboxTrait;

    public function getHtml()
    {


        //$workflowReader = new WorkflowInboxReader();


        $workflowReader = new WorkflowPaginationReader();
        $this->loadReader($workflowReader);

        $workflowReader->paginationLimit = 30;


        /*
        $workflowReader = new WorkflowPaginationReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadProcess();
        $workflowReader->paginationLimit = 30;
        $workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);

        $workflowCount = new WorkflowCount();

        // Process Filter
        foreach ($this->processFilterList as $process) {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $process->processId);
            $workflowCount->filter->andEqual($workflowReader->model->processId, $process->processId);
        }

        // User Filter
        if (sizeof($this->userIdFilterList) > 0) {

            $userAssignmentModel = new UserAssignmentModel();

            $join = new ModelJoin();
            $join->type = $workflowReader->model->id;
            $join->externalModel = $userAssignmentModel;
            $join->externalType = $userAssignmentModel->workflowId;

            $workflowReader->addJoin($join);
            $workflowCount->addJoin($join);


            $filter = new Filter();
            foreach ($this->userIdFilterList as $userId) {
                $filter->andEqual($userAssignmentModel->userId, $userId);
            }
            $workflowReader->filter->orFilter($filter);
            $workflowCount->filter->orFilter($filter);

        }


        // Usergroup Filter
        if (sizeof($this->usergroupFilterList) > 0) {

            $usergroupAssignmentModel = new UsergroupAssignmentModel();

            $join = new ModelJoin();
            $join->type = $workflowReader->model->id;
            $join->externalModel = $usergroupAssignmentModel;
            $join->externalType = $usergroupAssignmentModel->workflowId;

            $workflowReader->addJoin($join);
            $workflowCount->addJoin($join);

            $filter = new Filter();
            foreach ($this->usergroupFilterList as $usergroup) {
                $filter->andEqual($usergroupAssignmentModel->usergroupId, $usergroup->usergroupId);
            }
            $workflowReader->filter->orFilter($filter);
            $workflowCount->filter->orFilter($filter);

        }


        //if ($t)

        $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        $workflowCount->filter->andEqual($workflowCount->model->closed, true);


        /*
        if ($processListBox->getValue() !== '') {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $processListBox->getValue());
        }

        if (($statusListBox->getValue() == 1) || ($statusListBox->getValue() == '')) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($statusListBox->getValue() == 2) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        }*/


       // DbConfig::$sqlDebug=true;

        //$anzahl = $workflowCount->getCount();
        //$workflowReader->count = $anzahl;

        $p = new Paragraph($this);
        //$p->content = 'Total Workflow: ' . $anzahl;

        $table = new BootstrapClickableTable($this);
        $table->smallTable = true;
        $table->hover = true;


        $model = new WorkflowModel();

        $header = new TableHeader($table);
        $header->addText($model->processId->label);
        $header->addText($model->workflowNumber->label);
        $header->addText($model->subject->label);
        $header->addText($model->workflowStatusId->label);
        $header->addText($model->closed->label);
        $header->addText($model->deadline->label);
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

            $site = $workflowRow->process->getProcessClassObject()->getApplicationSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);

        }


        $pagination = new BootstrapModelPagination($this);
        $pagination->paginationReader = $workflowReader;


        return parent::getHtml();

    }


}