<?php

namespace Nemundo\Workflow\Site\Assignment;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Usergroup\Parameter\UsergroupParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\User\Data\Usergroup\UsergroupListBox;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentCount;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Data\UserNotification\UserNotificationDelete;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Admin\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;


class UsergroupAssignmentSite extends AbstractSite
{

    /**
     * @var UsergroupAssignmentSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Benutzergruppe Aufgaben';
        $this->url = 'usergroup-assignment';
        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

    }


    protected function registerSite()
    {
        UsergroupAssignmentSite::$site = $this;
    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $row = new BootstrapRow($page);
        $col1 = new BootstrapColumn($row);
        $col1->columnWidth = 4;

        $col2 = new BootstrapColumn($row);
        $col2->columnWidth = 8;


        $table = new AdminClickableTable($col1);

        $reader = new UserUsergroupReader();
        $reader->model->loadUsergroup();
        $reader->filter->andEqual($reader->model->userId, (new UserInformation())->getUserId());
        $reader->addOrder($reader->model->usergroup->usergroup);
        foreach ($reader->getData() as $userUsergroupRow) {


            $count = new UsergroupAssignmentCount();
            $count->filter->andEqual($count->model->usergroupId, $userUsergroupRow->usergroupId);
            $assignmentCount = $count->getCount();

            if ($assignmentCount > 0) {

                $row = new BootstrapClickableTableRow($table);
                $row->addText($userUsergroupRow->usergroup->usergroup . ' (' . $assignmentCount . ')');

                $site = clone(UsergroupAssignmentSite::$site);
                $site->title = $userUsergroupRow->usergroup->usergroup;
                $site->addParameter(new UsergroupParameter($userUsergroupRow->usergroupId));
                $row->addClickableSite($site);
            }

        }


        $usergroupParameter = new UsergroupParameter();

        if ($usergroupParameter->exists()) {

            $usergroupId = $usergroupParameter->getValue();

            $usergroupRow = (new UsergroupReader())->getRowById($usergroupId);

            $subtitle = new AdminSubtitle($col2);
            $subtitle->content = $usergroupRow->usergroup;


            $table = new BootstrapClickableTable($col2);


            $header = new TableHeader($table);
            $header->addText('Nr.');
            $header->addText('Betreff');
            //$header->addText('Status');
            $header->addText('Usergroup');
            $header->addText('Deleted');
            $header->addEmpty();


            $reader = new UsergroupAssignmentReader();
            $reader->model->loadWorkflow();
            $reader->model->workflow->loadProcess();
            $reader->filter->andEqual($reader->model->usergroupId, $usergroupId);

            foreach ($reader->getData() as $assignmentRow) {

                $row = new BootstrapClickableTableRow($table);
                $row->addText($assignmentRow->workflow->subject);


                $process = $assignmentRow->workflow->process->getProcessClassObject();

                $site = $process->getItemSite();
                $site->addParameter(new WorkflowParameter($assignmentRow->workflowId));
                $row->addClickableSite($site);


            }


        }


        /*
        $assignmentReader = new UsergroupAssignmentReader();
        $assignmentReader->model->loadWorkflow();
        $assignmentReader->model->workflow->loadProcess();
        $assignmentReader->model->workflow->loadWorkflowStatus();
        $assignmentReader->model->loadUsergroup();

        if ($usergroupListBox->getValue() !== '') {
            $assignmentReader->filter->andEqual($assignmentReader->model->usergroupId, $usergroupListBox->getValue());
        }

        $assignmentReader->addOrder($assignmentReader->model->delete);
        $assignmentReader->addOrder($assignmentReader->model->workflow->itemOrder, SortOrder::DESCENDING);


        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);

            $number = $assignmentRow->workflow->workflowNumber . ' (' . $assignmentRow->workflow->process->process . ')';


            $row->addText($number);  // $notificationRow->workflow->workflowNumber);
            $row->addText($assignmentRow->workflow->subject);
            //$row->addText($assignmentRow->workflow->workflowStatus->workflowStatusText);
            $row->addText($assignmentRow->usergroup->usergroup);

            $row->addYesNo($assignmentRow->delete);


            $site = $assignmentRow->workflow->process->getProcessClassObject()->getItemSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($assignmentRow->workflowId));
            $row->addClickableSite($site);

            /*$site = clone(NotificationDeleteSite::$site);
            $site->addParameter(new NotificationParameter($assignmentRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);*/


        //}


        $page->render();


    }


}