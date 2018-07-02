<?php

namespace Nemundo\Workflow\App\Inbox\Site;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxReader;

class InboxStreamSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Inbox Stream';
        $this->url = 'inbox-stream';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $inboxReader = new InboxReader();
        $inboxReader->model->loadContentType();
        $inboxReader->filter->andEqual($inboxReader->model->userId, (new UserInformation())->getUserId());
        $inboxReader->filter->andEqual($inboxReader->model->archive, false);

        $inboxReader->addOrder($inboxReader->model->dateTime, SortOrder::DESCENDING);

        foreach ($inboxReader->getData() as $inboxRow) {


            $widget = new AdminWidget($page);
            $widget->widgetTitle = $inboxRow->subject;

            $contentType = $inboxRow->contentType->getContentTypeClassObject();

            (new Debug())->write($contentType->getClassName());


            //(new Debug())->write($contentType->)

            $item = $contentType->getItem($widget);
            $item->dataId = $inboxRow->dataId;


            /*
              $text =

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

              $row->addClickableSite($contentType->getItemSite($inboxRow->dataId));*/

        }

        $page->render();


    }


}