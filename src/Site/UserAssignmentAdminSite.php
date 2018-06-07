<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
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
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;


class UserAssignmentAdminSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'User Assignment (Admin)';
        $this->url = 'user-assignment-admin';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $userListBox = new UserListBox($formRow);
        $userListBox->submitOnChange = true;
        $userListBox->value = $userListBox->getValue();


        $table = new BootstrapClickableTable($page);


        $header = new TableHeader($table);
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addEmpty();

        $assignmentReader = new UserAssignmentReader();
        $assignmentReader->model->loadWorkflow();
        $assignmentReader->model->workflow->loadProcess();
        $assignmentReader->model->workflow->loadWorkflowStatus();

        //$notificationReader->filter->andEqual($notificationReader->model->userId, (new UserInformation())->getUserId());
        $assignmentReader->filter->andEqual($assignmentReader->model->userId, $userListBox->getValue());

        //$notificationReader->filter->andNotEqual($notificationReader->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);
        $assignmentReader->addOrder($assignmentReader->model->workflow->itemOrder, SortOrder::DESCENDING);

        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);

            $number = $assignmentRow->workflow->workflowNumber . ' (' . $assignmentRow->workflow->process->process . ')';


            $row->addText($number);  // $notificationRow->workflow->workflowNumber);
            $row->addText($assignmentRow->workflow->subject);
            $row->addText($assignmentRow->workflow->workflowStatus->workflowStatusText);

            $site = $assignmentRow->workflow->process->getProcessClassObject()->getApplicationSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($assignmentRow->workflowId));
            $row->addClickableSite($site);

            /*$site = clone(NotificationDeleteSite::$site);
            $site->addParameter(new NotificationParameter($assignmentRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);*/


        }


        $page->render();


    }


}