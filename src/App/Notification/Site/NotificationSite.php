<?php

namespace Nemundo\Workflow\App\Notification\Site;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Type\UserSession;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationPaginationModelReader;
use Nemundo\Workflow\App\Notification\Data\NotificationFilter\NotificationFilterReader;

class NotificationSite extends AbstractSite
{

    /**
     * @var NotificationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title[LanguageCode::EN] = 'Notification';
        $this->title[LanguageCode::DE] = 'Benachrichtigungen';
        $this->url = 'notification';

        new NotificationRedirectSite($this);
        new NotificationArchiveSite($this);

    }


    protected function registerSite()
    {
        NotificationSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $btn = new AdminSiteButton($page);
        $btn->site = NotificationSite::$site;


        $layout = new BootstrapTwoColumnLayout($page);
        $layout->col1->columnWidth = 4;
        $layout->col2->columnWidth = 8;

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeId = $contentTypeParameter->getValue();


        $list = new BootstrapHyperlinkList($layout->col1);

        $notificationReader = new NotificationFilterReader();

        foreach ($notificationReader->getData() as $filterRow) {

            if ($filterRow->contentTypeId == $contentTypeId) {
                $list->addActiveHyperlink($filterRow->contentType->contentType);
            } else {
                $site = clone(NotificationSite::$site);
                $site->title = $filterRow->contentType->contentType;
                $site->addParameter(new ContentTypeParameter($filterRow->contentTypeId));
                $list->addSite($site);
            }

        }


        $table = new AdminClickableTable($layout->col2);

        $header = new TableHeader($table);
        $header->addText('Content Type');
        $header->addText('Subject');
        $header->addText('Date/Time');


        $notificationReader = new NotificationPaginationModelReader();
        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserSession())->userId);

        if ($contentTypeParameter->exists()) {
            $notificationReader->filter->andEqual($notificationReader->model->contentTypeId, $contentTypeId);
        }

        $notificationReader->model->loadContentType();

        $notificationReader->addOrder($notificationReader->model->dateTimeCreated, SortOrder::DESCENDING);
        $notificationReader->paginationLimit = 30;

        foreach ($notificationReader->getData() as $notificationRow) {


            $className = $notificationRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
            $contentType = new $className($notificationRow->dataId);


            $row = new BootstrapClickableTableRow($table);
            $row->addText($notificationRow->contentType->contentType);
            $row->addText($contentType->getSubject());

            $row->addText($notificationRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());


            $site = $contentType->getViewSite();
            if ($site !== null) {
                $row->addClickableSite($site);
            }


            /*
            $div = new Div($layout->col2);

            $small = new Small($div);
            $small->content = $notificationRow->contentType->contentType;


            $site = $contentType->getViewSite();
            if ($site !== null) {
                $hyperlink = new SiteHyperlink($div);
                $hyperlink->site = $site;
                $hyperlink->site->title = $notificationRow->message;
            } else {
                $p = new Paragraph($div);
                $p->content = $contentType->getSubject();
            }

            $p = new Paragraph($div);
            $p->content = $notificationRow->message;

            $p = new Paragraph($div);
            $p->content = $notificationRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat();

            new Hr($div);*/

        }


        $pagination = new BootstrapPagination($layout->col2);
        $pagination->paginationReader = $notificationReader;

        $page->render();


    }
}