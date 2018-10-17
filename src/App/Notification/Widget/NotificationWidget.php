<?php

namespace Nemundo\Workflow\App\Notification\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationReader;
use Nemundo\Workflow\App\Notification\Reader\NotificationItemReader;

class NotificationWidget extends AdminWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Notification';


        $table = new AdminClickableTable($this);

        $reader = new NotificationItemReader();
        //$reader->model->loadNotificationType();
        //$reader->addOrder($reader->model->id, SortOrder::DESCENDING);

        foreach ($reader->getData() as $notificationItem) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText( $notificationItem->subject);
            $row->addClickableSite($notificationItem->site);

        }

        return parent::getHtml();

    }


}