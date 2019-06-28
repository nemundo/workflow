<?php

namespace Nemundo\Workflow\App\Notification\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Table\Th;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Notification\Parameter\NotificationParameter;
use Nemundo\Workflow\App\Notification\Reader\NotificationItemReader;
use Nemundo\Workflow\App\Notification\Site\NotificationArchiveSite;
use Nemundo\Workflow\App\Notification\Site\NotificationSite;

class NotificationWidget extends AdminWidget
{


    /**
     * @var bool
     */
    public $showWidgetHyperlink = true;

    /**
     * @var bool
     */
    public $showDateTime = true;


    public function getContent()
    {

        $this->widgetTitle[LanguageCode::EN] = 'Notification';
        $this->widgetTitle[LanguageCode::DE] = 'Benachrichtigungen';

        if ($this->showWidgetHyperlink) {
            $this->widgetSite = NotificationSite::$site;
        }

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);

        $th = new Th($header);
        $th->content[LanguageCode::EN] = 'Subject';
        $th->content[LanguageCode::DE] = 'Betreff';

        $th = new Th($header);
        $th->content[LanguageCode::EN] = 'Message';
        $th->content[LanguageCode::DE] = 'Nachricht';

        if ($this->showDateTime) {
            $th = new Th($header);
            $th->content[LanguageCode::EN] = 'Date';
            $th->content[LanguageCode::DE] = 'Datum';
        }

        $header->addText('Message2');

        $header->addEmpty();

        $reader = new NotificationItemReader();

        foreach ($reader->getData() as $notificationItem) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($notificationItem->subject);
            $row->addText($notificationItem->message);
            $row->addText($notificationItem->message2);

            if ($this->showDateTime) {
                $row->addText($notificationItem->dateTime->getShortDateTimeLeadingZeroFormat());
            }

            $site = clone(NotificationArchiveSite::$site);
            $site->addParameter(new NotificationParameter($notificationItem->id));
            $row->addIconSite($site);

            $row->addClickableSite($notificationItem->site);

        }

        return parent::getContent();

    }

}