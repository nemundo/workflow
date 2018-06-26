<?php

namespace Nemundo\Workflow\Reader\Notification;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;

class NotificationItemReader extends AbstractDataSource
{


    /**
     * @return NotificationItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $notificationReader = new UserNotificationReader();
        $notificationReader->model->loadStatusChange();
        $notificationReader->model->statusChange->loadWorkflow();
        $notificationReader->model->statusChange->workflow->loadProcess();
        $notificationReader->model->statusChange->loadWorkflowStatus();
        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserInformation())->getUserId());
        $notificationReader->filter->andEqual($notificationReader->model->delete, false);
        $notificationReader->addOrder($notificationReader->model->statusChange->workflow->itemOrder, SortOrder::DESCENDING);


        //$notificationReader->limit = 10;

        foreach ($notificationReader->getData() as $notificationRow) {

            $number = $notificationRow->statusChange->workflow->workflowNumber;

            if ($number !== '') {
                $number .= ': ';
            }


            $item = new NotificationItem($notificationRow);
            $item->workflowNumber = $notificationRow->statusChange->workflow->workflowNumber;
            $item->subject = $notificationRow->statusChange->workflow->subject;
            $item->title = $number . $notificationRow->statusChange->workflow->subject;
            $item->message = $notificationRow->statusChange->message;
            $this->addItem($item);


            //$row->addText($number);

            //      $row->addText($notificationRow->statusChange->workflowStatus->workflowStatusText);
            //$row->addText($notificationRow->statusChange->workflowStatus->workflowStatus);

            //$row->addText($notificationRow->statusChange->workflow->subject);
            /*$row->addText($number . $notificationRow->statusChange->workflow->subject);

            $row->addText($notificationRow->statusChange->message);

            $process = $notificationRow->statusChange->workflow->process->getProcessClassObject();

            if ($process !== null) {
                $site = $process->getItemSite();
                $site->addParameter(new WorkflowParameter($notificationRow->statusChange->workflowId));
                $row->addClickableSite($site);
            }

            $site = clone(NotificationDeleteSite::$site);
            $site->addParameter(new NotificationParameter($notificationRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);*/

        }


    }

}