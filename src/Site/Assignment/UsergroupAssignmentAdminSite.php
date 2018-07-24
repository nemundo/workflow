<?php

namespace Nemundo\Workflow\Site\Assignment;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\User\Data\Usergroup\UsergroupListBox;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Design\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Data\UserNotification\UserNotificationDelete;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Admin\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Design\FontAwesome\Icon\DeleteIcon;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;


class UsergroupAssignmentAdminSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Usergroup Assignment (Admin)';
        $this->url = 'usergroup-assignment-admin';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $usergroupListBox = new UsergroupListBox($formRow);
        $usergroupListBox->submitOnChange = true;
        $usergroupListBox->value = $usergroupListBox->getValue();


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Nr.');
        $header->addText('Betreff');
        //$header->addText('Status');
        $header->addText('Usergroup');
        $header->addText('Deleted');
        $header->addEmpty();

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


        }


        $page->render();


    }


}