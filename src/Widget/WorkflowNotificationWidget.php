<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Admin\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Design\FontAwesome\Icon\DeleteIcon;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;

class WorkflowNotificationWidget extends AbstractAdminWidget
{

    public function getHtml()
    {

        // Benachrichtigung
        //$this->widgetTitle = 'Workflow Notification';
        $this->widgetTitle = 'Benachrichtigungen';


        $table = new BootstrapClickableTable($this);


        $header = new TableHeader($table);
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addEmpty();

        $notificationReader = new UserNotificationReader();
        $notificationReader->model->loadWorkflow();
        $notificationReader->model->workflow->loadProcess();
        $notificationReader->model->workflow->loadWorkflowStatus();
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


        }

        return parent::getHtml();

    }


}