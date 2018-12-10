<?php

namespace Nemundo\Workflow\App\Notification\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Basic\Small;
use Nemundo\Com\Html\Div\DivContainer;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationPaginationReader;
use Nemundo\Workflow\App\Notification\Data\NotificationFilter\NotificationFilterReader;

class NotificationSite extends AbstractSite
{

    /**
     * @var NotificationSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Notification';
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


        $notificationReader = new NotificationPaginationReader();
        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserSessionType())->userId);

        if ($contentTypeParameter->exists()) {
            $notificationReader->filter->andEqual($notificationReader->model->contentTypeId, $contentTypeId);
        }

        $notificationReader->model->loadContentType();
        foreach ($notificationReader->getData() as $notificationRow) {


            $className = $notificationRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
            $contentType = new $className($notificationRow->dataId);


            $div = new DivContainer($layout->col2);

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
            $p->content = $contentType->getText();

            $p = new Paragraph($div);
            $p->content = $notificationRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat();


            new Hr($div);


        }


        $pagination = new BootstrapModelPagination($layout->col2);
        $pagination->paginationReader = $notificationReader;

        $page->render();


    }
}