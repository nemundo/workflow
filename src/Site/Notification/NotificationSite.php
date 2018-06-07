<?php

namespace Nemundo\Workflow\Site\Notification;


use Nemundo\Com\Html\Basic\H1;
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
use Nemundo\Workflow\Com\Item\WorkflowItem;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\UserNotification\UserNotificationCount;
use Nemundo\Workflow\Data\UserNotification\UserNotificationPaginationReader;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class NotificationSite extends AbstractSite
{

    /**
     * @var NotificationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Notification';
        $this->url = 'notification';

    }


    protected function registerSite()
    {
        NotificationSite::$site = $this;
    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $processParameter = new  ProcessParameter();
        //$notificationTypeId = $notificationTypeParameter->getValue();

        $row = new BootstrapRow($page);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;


        $list = new BootstrapHyperlinkList($colLeft);

        $processReader = new ProcessReader();

        //$reader->addOrder($reader->model->applicationType);

        foreach ($processReader->getData() as $processRow) {

            $count = new UserNotificationCount();
            $count->model->loadWorkflow();
            $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
            $count->filter->andEqual($count->model->workflow->processId, $processRow->id);
            //$count->filter->andNotEqual($count->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);

            $totalCount = $count->getCount();

            if ($totalCount > 0) {

                /*
                $count = new NotificationCount();
                $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
                $count->filter->andEqual($count->model->applicationTypeId, $processRow->id);
                $count->filter->andEqual($count->model->notificationStatusId, (new UnreadNotificationStatus())->uniqueId);
                $unreadCount = $count->getCount();*/

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

                $site->title = $processRow->process . ' (' . $totalCount . ')';  // $title;
                $site->addParameter(new ProcessParameter($processRow->id));  // NotificationTypeParameter($processRow->id));

                $list->addSite($site);

            }

        }


        if ($processParameter->exists()) {


            $processId = $processParameter->getValue();

            $processRow = (new ProcessReader())->getRowById($processId);

            $title = new H1($colRight);
            $title->content = $processRow->process;

            /*$table = new NotificationWorkflowTable($colRight);
            $table->notificationReader->filter->andNotEqual($table->notificationReader->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);
            $table->notificationReader->filter->andEqual($table->notificationReader->model->applicationTypeId, $processRow->id);
*/

            $table = new BootstrapClickableTable($colRight);


            $notificationReader = new UserNotificationPaginationReader();
            $notificationReader->model->loadWorkflow();
            $notificationReader->model->workflow->loadProcess();
            $notificationReader->model->workflow->loadWorkflowStatus();
            $notificationReader->filter->andEqual($notificationReader->model->workflow->processId, $processId);
            $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserInformation())->getUserId());

            //$notificationReader->filter->andNotEqual($notificationReader->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);
            $notificationReader->addOrder($notificationReader->model->workflow->itemOrder, SortOrder::DESCENDING);

            foreach ($notificationReader->getData() as $notificationRow) {

                $row = new BootstrapClickableTableRow($table);

                $number = $notificationRow->workflow->workflowNumber . ' (' . $notificationRow->workflow->process->process . ')';


                $row->addText($number);  // $notificationRow->workflow->workflowNumber);
                $row->addText($notificationRow->workflow->subject);
                $row->addText($notificationRow->workflow->workflowStatus->workflowStatusText);

                $site = $notificationRow->workflow->process->getProcessClassObject()->getApplicationSite();  //$workflowRow->dataId);
                $site->addParameter(new WorkflowParameter($notificationRow->workflowId));
                $row->addClickableSite($site);

                $site = clone(NotificationDeleteSite::$site);
                $site->addParameter(new NotificationParameter($notificationRow->id));
                $row->addHyperlinkIcon(new DeleteIcon(), $site);


                $workflowStatus = $notificationRow->workflow->workflowStatus->getWorkflowStatusClassObject();
                if ($workflowStatus->workflowItemClassName !== null) {

                    $tr = new Tr($table);
                    $td = new Td($tr);
                    $td->colspan = 3;

                    /** @var WorkflowItem $item */
                    $item = new $workflowStatus->workflowItemClassName($td);
                    $item->workflowId = $notificationRow->workflowId;
                    //$item->workflowItemId = $notificationRow->workflow-



                }

            }

            $pagination = new BootstrapModelPagination($colRight);
            $pagination->paginationReader = $notificationReader;

        }

        $page->render();

    }


}