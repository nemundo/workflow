<?php

namespace Nemundo\Workflow\App\Inbox\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\Html\Basic\Br;
use Nemundo\Com\Html\Table\Tr;
use Nemundo\Com\TableBuilder\TableCell;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxPaginationReader;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxReader;
use Nemundo\Workflow\App\Inbox\Parameter\InboxParameter;
use Nemundo\Workflow\App\Inbox\Site\InboxArchiveSite;
use Nemundo\Workflow\App\Inbox\Site\InboxRedirectSite;
use Nemundo\Workflow\App\Inbox\Site\InboxSite;
use Nemundo\Workflow\App\Inbox\Site\InboxStreamSite;

class InboxWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {

        $this->widgetTitle = 'Benachrichtigungen';  // 'Inbox';
        $this->widgetSite = InboxSite::$site;  // InboxStreamSite::$site;

    }


    public function getHtml()
    {

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Betreff');
        $header->addText('Nachricht');
        $header->addText('Datum/Zeit');
        $header->addText('Quelle');
        $header->addEmpty();


        $inboxReader = new InboxReader();  // InboxPaginationReader();
        $inboxReader->model->loadContentType();
        $inboxReader->filter->andEqual($inboxReader->model->userId, (new UserInformation())->getUserId());
        $inboxReader->filter->andEqual($inboxReader->model->archive, false);
        $inboxReader->addOrder($inboxReader->model->dateTime, SortOrder::DESCENDING);
        $inboxReader->limit = 20;  // paginationLimit = 50;

        foreach ($inboxReader->getData() as $inboxRow) {

            $row = new BootstrapClickableTableRow($table);
            //$row->addText($inboxRow->contentType->contentType);

            $subject = $inboxRow->subject;
            $message = $inboxRow->message;
            /*if ($inboxRow->message !== '') {
                $text .= ':' . (new Br())->getHtmlString() . $inboxRow->message;
            }*/

            $dateTime = $inboxRow->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentType = $inboxRow->contentType->getContentTypeClassObject();
            $contentType->dataId = $inboxRow->dataId;

            $subject = $contentType->getSubject();



            $source = $contentType->objectName;


            if ($inboxRow->read == 0) {
                $row->addBoldText($subject);
                $row->addBoldText($message);
                $row->addBoldText($dateTime);
                $row->addBoldText($source);
            } else {
                $row->addText($subject);
                $row->addText($message);
                $row->addText($dateTime);
                $row->addText($source);
            }


            //$row->addText($inboxRow->subject . ': ' . $inboxRow->message);


            //$row->addText($contentType->name);


            //$contentRedirect = $inboxRow->getContentRedirectObject();

            $site = clone(InboxArchiveSite::$site);
            $site->addParameter(new InboxParameter($inboxRow->id));
            $row->addIconSite($site);


            $site = $contentType->getItemSite($inboxRow->dataId);
            if ($site !== null) {
                //$row->addClickableSite($site);

                $site = clone(InboxRedirectSite::$site);
                $site->addParameter(new InboxParameter($inboxRow->id));
                $row->addClickableSite($site);

            }


            /*$site = $contentRedirect->getSite($inboxRow->dataId);
            if ($site !== null) {
                $row->addClickableSite($site);
            }*/

        }

        //$pagination = new BootstrapModelPagination($this);
        //$pagination->paginationReader = $inboxReader;

        return parent::getHtml();

    }

}