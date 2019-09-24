<?php

namespace Nemundo\Workflow\App\Notification\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Formatting\Small;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationPaginationReader;
use Nemundo\Workflow\App\Notification\Data\NotificationFilter\NotificationFilterReader;

class NotificationAdminSite extends AbstractSite
{

    /**
     * @var NotificationSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Notification Admin';
        $this->url = 'notification-admin';

    }


    protected function registerSite()
    {
        NotificationSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);
        $layout->col1->columnWidth = 0;
        $layout->col2->columnWidth = 12;

        //$contentTypeParameter = new ContentTypeParameter();
        //$contentTypeId = $contentTypeParameter->getValue();


        /*
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

        }*/


        $table = new AdminClickableTable($layout->col2);


        $notificationReader = new NotificationPaginationReader();
        //$notificationReader->filter->andEqual($notificationReader->model->userId, (new UserSessionType())->userId);

        /*
        if ($contentTypeParameter->exists()) {
            $notificationReader->filter->andEqual($notificationReader->model->contentTypeId, $contentTypeId);
        }*/

        $notificationReader->model->loadContentType();

        $notificationReader->addOrder($notificationReader->model->dateTimeCreated, SortOrder::DESCENDING);
$notificationReader->paginationLimit = 50;

        foreach ($notificationReader->getData() as $notificationRow) {


            $className = $notificationRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
            $contentType = new $className($notificationRow->dataId);


            $row = new TableRow($table);
            $row->addText($notificationRow->dateTimeCreated->getIsoDateTimeFormat());
            $row->addText($notificationRow->user->login);
            $row->addText($notificationRow->contentType->contentType);
            $row->addText($notificationRow->message);


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
            }*/


            //$p = new Paragraph($div);
            //$p->content = $contentType->getText();

           /* $p = new Paragraph($div);
            $p->content = $notificationRow->message;  // contentType->getText();


            $p = new Paragraph($div);
            $p->content = $notificationRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat();

*/
            //new Hr($div);


        }


        $pagination = new BootstrapPagination($layout->col2);
        $pagination->paginationReader = $notificationReader;

        $page->render();


    }
}