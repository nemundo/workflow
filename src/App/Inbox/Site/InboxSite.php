<?php

namespace Nemundo\Workflow\App\Inbox\Site;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Com\ContentTypeHyperlinkList;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxReader;
use Nemundo\Workflow\App\Inbox\Widget\InboxWidget;
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
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxPaginationReader;
use Nemundo\Workflow\App\Inbox\Parameter\InboxParameter;



class InboxSite extends AbstractSite
{

    /**
     * @var InboxSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Inbox';
        $this->url = 'app-inbox';

        new InboxRedirectSite($this);
        new InboxArchiveSite($this);
        new ContentTypeArchiveSite($this);

    }


    protected function registerSite()
    {
        InboxSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeId = $contentTypeParameter->getValue();


        $title = new AdminTitle($page);
        $title->content = InboxSite::$site->title;



        $row = new BootstrapRow($page);

        $col1 = new BootstrapColumn($row);
        $col1->columnWidth = 4;

        $col2 = new BootstrapColumn($row);
        $col2->columnWidth = 8;


        $btn = new AdminButton($col1);
        $btn->content = 'Inbox';
        $btn->site = clone(InboxSite::$site);


        $contentTypeList = new ContentTypeHyperlinkList($col1);
        $contentTypeList->redirectSite = InboxSite::$site;


        if ($contentTypeParameter->exists()) {

            $btn = new AdminButton($col2);
            $btn->content = 'alle löschen';
            $btn->site = ContentTypeArchiveSite::$site;
            $btn->site->addParameter($contentTypeParameter);

        }



        /*
        $contentTypeList = new BootstrapHyperlinkList($col1);



        $inboxReader = new InboxReader();
        $inboxReader->model->loadContentType();
        $inboxReader->filter->andEqual($inboxReader->model->userId, (new UserInformation())->getUserId());
        $inboxReader->filter->andEqual($inboxReader->model->archive, false);



        $inboxReader->addGroup($inboxReader->model->contentTypeId);
        $inboxReader->addOrder($inboxReader->model->contentType->contentType);

        foreach ($inboxReader->getData() as $inboxRow) {


            if ($inboxRow->contentTypeId == $contentTypeId) {
                $contentTypeList->addActiveHyperlink($inboxRow->contentType->contentType);
            } else {

                $site = clone(InboxSite::$site);
                $site->title = $inboxRow->contentType->contentType;
                $site->addParameter(new ContentTypeParameter($inboxRow->contentTypeId));

                $contentTypeList->addSite($site);
            }





        }*/


        $table = new AdminClickableTable($col2);

        $header = new TableHeader($table);
        $header->addText('Betreff');
        $header->addText('Nachricht');
        $header->addText('Datum/Zeit');
        $header->addText('Quelle');
        $header->addEmpty();


        $inboxReader = new InboxPaginationReader();
        $inboxReader->model->loadContentType();
        $inboxReader->filter->andEqual($inboxReader->model->userId, (new UserInformation())->getUserId());
        $inboxReader->filter->andEqual($inboxReader->model->archive, false);
        if ($contentTypeParameter->exists()) {
            $inboxReader->filter->andEqual($inboxReader->model->contentTypeId, $contentTypeParameter->getValue());

        }
        $inboxReader->addOrder($inboxReader->model->dateTime, SortOrder::DESCENDING);
        $inboxReader->paginationLimit = 50;

        foreach ($inboxReader->getData() as $inboxRow) {

            $row = new BootstrapClickableTableRow($table);
            //$row->addText($inboxRow->contentType->contentType);

            $text = $inboxRow->subject;
            $message = $inboxRow->message;
            /*if ($inboxRow->message !== '') {
                $text .= ':' . (new Br())->getHtmlString() . $inboxRow->message;
            }*/

            $dateTime = $inboxRow->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentType = $inboxRow->contentType->getContentTypeClassObject();
            $source = $contentType->contentName;


            if ($inboxRow->read == 0) {
                $row->addBoldText($text);
                $row->addBoldText($message);
                $row->addBoldText($dateTime);
                $row->addBoldText($source);
            } else {
                $row->addText($text);
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

        $pagination = new BootstrapModelPagination($col2);
        $pagination->paginationReader = $inboxReader;






        $page->render();


    }


}