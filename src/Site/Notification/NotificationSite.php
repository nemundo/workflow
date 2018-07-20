<?php

namespace Nemundo\Workflow\Site\Notification;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\Bold;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Table\Td;
use Nemundo\Com\Html\Table\Tr;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Design\FontAwesome\Icon\DeleteIcon;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Design\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Design\Bootstrap\Layout\BootstrapRow;
use Nemundo\Design\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Workflow\Content\Item\AbstractWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Content\Item\WorkflowItem;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\UserNotification\UserNotificationCount;
use Nemundo\Workflow\Data\UserNotification\UserNotificationPaginationReader;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\TrashParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class NotificationSite extends AbstractSite
{

    /**
     * @var NotificationSite
     */
    public static $site;

    protected function loadSite()
    {

        //$this->title = 'Notification';
        $this->title = 'Benachrichtigungen';
        $this->url = 'notification';

        new NotificationRedirectSite($this);
        new UserNotificationDeleteSite($this);


    }


    protected function registerSite()
    {
        NotificationSite::$site = $this;
    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;


        $processParameter = new  ProcessParameter();

        $row = new BootstrapRow($page);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;


        $list = new BootstrapHyperlinkList($colLeft);

        $processReader = new ProcessReader();

        foreach ($processReader->getData() as $processRow) {

            $count = new UserNotificationCount();
            $count->model->loadStatusChange();
            $count->model->statusChange->loadWorkflow();
            $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
            $count->filter->andEqual($count->model->delete, false);
            $count->filter->andEqual($count->model->statusChange->workflow->processId, $processRow->id);

            $totalCount = $count->getCount();

            if ($totalCount > 0) {


                $count = new UserNotificationCount();
                $count->model->loadStatusChange();
                $count->model->statusChange->loadWorkflow();
                $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
                $count->filter->andEqual($count->model->delete, false);
                $count->filter->andEqual($count->model->statusChange->workflow->processId, $processRow->id);
                $count->filter->andEqual($count->model->read, false);
                $unreadCount = $count->getCount();

                $badgeHtml = '';
                if ($unreadCount > 0) {
                    $badgeHtml = ' <span class="badge badge-secondary">' . $unreadCount . '</span>';
                }


                //$count->filter->andEqual($count->model->applicationTypeId, $processRow->id);
                //$count->filter->andEqual($count->model->notificationStatusId, (new UnreadNotificationStatus())->uniqueId);


                /*$badgeHtml = '';
                if ($unreadCount > 0) {
                    $badgeHtml = ' <span class="badge badge-secondary">' . $unreadCount . '</span>';
                }

                $title = $processRow->applicationType . $badgeHtml;

                /*if ($notificationTypeId == $processRow->id) {
                    $list->addActiveHyperlink($title);
                } else {

                    $site = clone(NotificationSite::$site);

                    $site->title = $title;
                    $site->addParameter(new NotificationTypeParameter($processRow->id));

                    $list->addSite($site);

                }*/

                $site = clone(NotificationSite::$site);
                //$site->title = $processRow->process . ' (' . $totalCount . ')' . $badgeHtml;
                $site->title = $processRow->process . $badgeHtml;
                $site->addParameter(new ProcessParameter($processRow->id));  // NotificationTypeParameter($processRow->id));

                $list->addSite($site);

            }

        }


        $list->addHtml('');


        $site = clone(NotificationSite::$site);
        $site->title = 'Gelöschte Benachrichtigungen';
        $site->addParameter(new TrashParameter());
        $list->addSite($site);


        $processId = null;
        if ($processParameter->exists()) {


            $processId = $processParameter->getValue();

            $processRow = (new ProcessReader())->getRowById($processId);

            $title = new AdminSubtitle($colRight);
            $title->content = $processRow->process;


        }

        /*$table = new NotificationWorkflowTable($colRight);
        $table->notificationReader->filter->andNotEqual($table->notificationReader->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);
        $table->notificationReader->filter->andEqual($table->notificationReader->model->applicationTypeId, $processRow->id);
*/

        $table = new BootstrapClickableTable($colRight);


        $notificationReader = new UserNotificationPaginationReader();
        $notificationReader->model->loadStatusChange();
        $notificationReader->model->statusChange->loadWorkflow();
        $notificationReader->model->statusChange->workflow->loadProcess();
        $notificationReader->model->statusChange->loadWorkflowStatus();

        if ($processId !== null) {
            $notificationReader->filter->andEqual($notificationReader->model->statusChange->workflow->processId, $processId);
        }

        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserInformation())->getUserId());

        if ((new TrashParameter())->exists()) {
            $notificationReader->filter->andEqual($notificationReader->model->delete, true);

        } else {
            $notificationReader->filter->andEqual($notificationReader->model->delete, false);
        }


        //$notificationReader->filter->andNotEqual($notificationReader->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);
        $notificationReader->addOrder($notificationReader->model->statusChange->workflow->itemOrder, SortOrder::DESCENDING);

        foreach ($notificationReader->getData() as $notificationRow) {

            $row = new BootstrapClickableTableRow($table);

            $number = $notificationRow->statusChange->workflow->workflowNumber . ' (' . $notificationRow->statusChange->workflow->process->process . ')';


            $row->addText($number);  // $notificationRow->workflow->workflowNumber);


            if ($notificationRow->read) {
                $row->addText($notificationRow->statusChange->workflow->subject);
            } else {
                $bold = new Bold($row);
                $bold->content = $notificationRow->statusChange->workflow->subject;
            }


            //$row->addText($notificationRow->statusChange->workflowStatus->workflowStatusText);
            $row->addText($notificationRow->statusChange->message);


            /*$site = $notificationRow->statusChange->workflow->process->getProcessClassObject()->getItemSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($notificationRow->statusChange->workflowId));
            $row->addClickableSite($site);*/

            $site = NotificationRedirectSite::$site;
            $site->addParameter(new NotificationParameter($notificationRow->id));
            $row->addClickableSite($site);


            $site = clone(NotificationDeleteSite::$site);
            $site->addParameter(new NotificationParameter($notificationRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);


            /*
            $workflowStatus = $notificationRow->statusChange->workflowStatus->getWorkflowStatusClassObject();
            if ($workflowStatus->workflowItemViewClassName !== null) {

                $tr = new Tr($table);
                $td = new Td($tr);
                $td->colspan = 3;

                /** @var AbstractWorkflowItemView $item */
            /*      $item = new $workflowStatus->workflowItemViewClassName($td);
                  $item->workflowItemId = $notificationRow->statusChange->workflowItemId;
                  //$item->workflowItemId = $notificationRow->workflow-

              }*/

        }

        $pagination = new BootstrapModelPagination($colRight);
        $pagination->paginationReader = $notificationReader;


        /*
        $btn = new AdminButton($colRight);
        $btn->content = 'Alle Benachrichtigungen löschen';
        $btn->site = UserNotificationDeleteSite::$site;*/

        $page->render();

    }


}