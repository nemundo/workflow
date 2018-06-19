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
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;
use Nemundo\Workflow\Site\Notification\NotificationSite;

class WorkflowNotificationWidget extends AbstractAdminWidget
{

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
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addEmpty();

        $notificationReader = new UserNotificationReader();
        $notificationReader->model->loadStatusChange();
        $notificationReader->model->statusChange->loadWorkflow();
        $notificationReader->model->statusChange->workflow->loadProcess();
        $notificationReader->model->statusChange->loadWorkflowStatus();
        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserInformation())->getUserId());
        $notificationReader->addOrder($notificationReader->model->statusChange->workflow->itemOrder, SortOrder::DESCENDING);

        //$notificationReader->limit = 10;

        foreach ($notificationReader->getData() as $notificationRow) {

            $row = new BootstrapClickableTableRow($table);

            $number = $notificationRow->statusChange->workflow->workflowNumber;

            $row->addText($number);
            $row->addText($notificationRow->statusChange->workflow->subject);
            $row->addText($notificationRow->statusChange->workflowStatus->workflowStatusText);

            $process = $notificationRow->statusChange->workflow->process->getProcessClassObject();

            if ($process !== null) {
                $site = $process->getApplicationSite();
                $site->addParameter(new WorkflowParameter($notificationRow->statusChange->workflowId));
                $row->addClickableSite($site);
            }

            $site = clone(NotificationDeleteSite::$site);
            $site->addParameter(new NotificationParameter($notificationRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);

        }

        return parent::getHtml();

    }

}