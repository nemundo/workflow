<?php

namespace Nemundo\Workflow\App\Notification\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Html\Table\Th;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Notification\Parameter\NotificationParameter;
use Nemundo\Workflow\App\Notification\Reader\NotificationItemReader;
use Nemundo\Workflow\App\Notification\Site\NotificationArchiveSite;
use Nemundo\Workflow\App\Notification\Site\NotificationSite;

class NotificationWidget extends AdminWidget
{


    protected function loadWidget()
    {
        //$this->widgetSite = NotificationSite::$site;

    }


    public function getHtml()
    {


        //$this->widgetTitle = 'Notification';

        $this->widgetTitle[LanguageCode::EN] = 'Notification';
        $this->widgetTitle[LanguageCode::DE] = 'Benachrichtigungen';


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);

        $th = new Th($header);
        $th->content[LanguageCode::EN] = 'Subject';
        $th->content[LanguageCode::DE] = 'Betreff';

        $th = new Th($header);
        $th->content[LanguageCode::EN] = 'Message';
        $th->content[LanguageCode::DE] = 'Nachricht';

        //$header->addText('Subject');
        //$header->addText('Message');
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