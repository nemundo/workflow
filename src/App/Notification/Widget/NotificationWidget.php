<?php

namespace Nemundo\Workflow\App\Notification\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationReader;

class NotificationWidget extends AdminWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Notification2';


        $table = new AdminClickableTable($this);

        $reader = new NotificationReader();
        $reader->model->loadNotificationType();
        $reader->addOrder($reader->model->id, SortOrder::DESCENDING);

        foreach ($reader->getData() as $notificationRow) {

            $row = new BootstrapClickableTableRow($table);
            //$row->addText($notificationRow->dataId);

            $notificationType = $notificationRow->notificationType->getNotificationTypeObject();

            $row->addText($notificationType->getNotificationText($notificationRow->dataId));

            $row->addClickableSite($notificationType->getItemSite($notificationRow->dataId));


        }


        return parent::getHtml();

    }


}