<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Design\FontAwesome\Icon\DeleteIcon;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Reader\Notification\NotificationItemReader;
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;
use Nemundo\Workflow\Site\Notification\NotificationRedirectSite;
use Nemundo\Workflow\Site\Notification\NotificationSite;

class WorkflowNotificationWidget extends AbstractAdminWidget
{


    protected function loadWidget()
    {
        $this->widgetTitle = '';
        $this->widgetId = '';
    }

    protected function loadCom()
    {

        // Benachrichtigung
        //$this->widgetTitle = 'Workflow Notification';

        $this->widgetTitle = 'Benachrichtigungen';
        $this->widgetSite = NotificationSite::$site;

        parent::loadCom();

    }


    public function getHtml()
    {

        $table = new BootstrapClickableTable($this);

        $header = new TableHeader($table);
        //$header->addText('Nr.');
        //$header->addText('Status');
        $header->addText('Betreff');
        $header->addText('Nachricht');
        $header->addEmpty();


        $notificationReader = new NotificationItemReader();

        /*$notificationReader = new UserNotificationReader();
        $notificationReader->model->loadStatusChange();
        $notificationReader->model->statusChange->loadWorkflow();
        $notificationReader->model->statusChange->workflow->loadProcess();
        $notificationReader->model->statusChange->loadWorkflowStatus();
        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserInformation())->getUserId());
        $notificationReader->addOrder($notificationReader->model->statusChange->workflow->itemOrder, SortOrder::DESCENDING);*/

        //$notificationReader->limit = 10;

        foreach ($notificationReader->getData() as $notificationItem) {

            $row = new BootstrapClickableTableRow($table);

            /*$number = $notificationRow->statusChange->workflow->workflowNumber;

            if ($number !== '') {
                $number .= ': ';
            }*/

            //$row->addText($number);

            //      $row->addText($notificationRow->statusChange->workflowStatus->workflowStatusText);
            //$row->addText($notificationRow->statusChange->workflowStatus->workflowStatus);

            //$row->addText($notificationRow->statusChange->workflow->subject);
            //$row->addText($number . $notificationRow->statusChange->workflow->subject);
            //$row->addText($notificationRow->statusChange->message);
            $row->addText($notificationItem->getTitle());
            $row->addText($notificationItem->message);


            /*
                        $process = $notificationRow->statusChange->workflow->process->getProcessClassObject();

                        if ($process !== null) {
                            $site = $process->getItemSite();
                            $site->addParameter(new WorkflowParameter($notificationRow->statusChange->workflowId));
                            $row->addClickableSite($site);
                        }*/


            //$site = $notificationItem->getItemSite();


            $row->addClickableSite($notificationItem->getItemSite());

            //$site = clone(NotificationDeleteSite::$site);
            //$site->addParameter(new NotificationParameter($notificationRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $notificationItem->getDeleteSite());

        }

        return parent::getHtml();

    }

}