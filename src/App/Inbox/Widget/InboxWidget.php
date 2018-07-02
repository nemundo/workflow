<?php

namespace Nemundo\Workflow\App\Inbox\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\Html\Basic\Br;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxReader;
use Nemundo\Workflow\App\Inbox\Parameter\InboxParameter;
use Nemundo\Workflow\App\Inbox\Site\InboxArchiveSite;
use Nemundo\Workflow\App\Inbox\Site\InboxSite;

class InboxWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {

        $this->widgetTitle = 'Inbox';
        $this->widgetSite = InboxSite::$site;

    }


    public function getHtml()
    {


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        //$header->addText('Quelle');
        $header->addText('Betreff');
        $header->addText('Datum/Zeit');
        $header->addEmpty();


        $inboxReader = new InboxReader();
        $inboxReader->model->loadContentType();
        $inboxReader->filter->andEqual($inboxReader->model->userId, (new UserInformation())->getUserId());
        $inboxReader->filter->andEqual($inboxReader->model->archive, false);

        $inboxReader->addOrder($inboxReader->model->dateTime, SortOrder::DESCENDING);

        foreach ($inboxReader->getData() as $inboxRow) {

            $row = new BootstrapClickableTableRow($table);
            //$row->addText($inboxRow->contentType->contentType);

            $text = $inboxRow->subject;

            if ($inboxRow->message !== '') {
                $text .= ':' . (new Br())->getHtmlString() . $inboxRow->message;
            }

            $row->addText($text);

            //$row->addText($inboxRow->subject . ': ' . $inboxRow->message);

            $row->addText($inboxRow->dateTime->getShortDateTimeLeadingZeroFormat());

            $contentType = $inboxRow->contentType->getContentTypeClassObject();

            $site = clone(InboxArchiveSite::$site);
            $site->addParameter(new InboxParameter($inboxRow->id));
            $row->addIconSite($site);

            $row->addClickableSite($contentType->getItemSite($inboxRow->dataId));

        }


        return parent::getHtml();
    }


}