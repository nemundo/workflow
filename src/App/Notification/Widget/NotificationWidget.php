<?php

namespace Nemundo\Workflow\App\Notification\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Notification\Parameter\NotificationParameter;
use Nemundo\Workflow\App\Notification\Reader\NotificationItemReader;
use Nemundo\Workflow\App\Notification\Site\NotificationArchiveSite;

class NotificationWidget extends AdminWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Notification';


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Subject');
        $header->addText('Message');
        $header->addEmpty();

        $reader = new NotificationItemReader();

        foreach ($reader->getData() as $notificationItem) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($notificationItem->subject);
            $row->addText($notificationItem->message);

            $site = clone(NotificationArchiveSite::$site);
            $site->addParameter(new NotificationParameter($notificationItem->id));
            $row->addIconSite($site);

            $row->addClickableSite($notificationItem->site);

        }

        return parent::getHtml();

    }

}