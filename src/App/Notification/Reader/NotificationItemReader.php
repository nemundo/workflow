<?php

namespace Nemundo\Workflow\App\Notification\Reader;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationReader;
use Nemundo\Workflow\App\Notification\Parameter\NotificationParameter;
use Nemundo\Workflow\App\Notification\Site\NotificationRedirectSite;

class NotificationItemReader extends AbstractDataSource
{


    /**
     * @return NotificationItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $notificationReader = new NotificationReader();
        $notificationReader->model->loadContentType();
        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserSessionType())->userId);
        $notificationReader->filter->andEqual($notificationReader->model->archive, false);
        $notificationReader->addOrder($notificationReader->model->dateTimeCreated, SortOrder::DESCENDING);
        $notificationReader->limit = 20;  // paginationLimit = 50;

        foreach ($notificationReader->getData() as $notificationRow) {

            $item = new NotificationItem();
            $item->id = $notificationRow->id;
            $item->source = $notificationRow->contentType->contentType;
            $item->subject = $notificationRow->subject;
            $item->message = $notificationRow->message;
            $item->dateTime = $notificationRow->dateTimeCreated;
            $item->dateTimeText = $notificationRow->dateTimeCreated->getShortDateLeadingZeroFormat();

            $className = $notificationRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
            $contentType = new $className($notificationRow->dataId);

            // (new Debug())->write($contentType->getViewSite());


            if ($contentType->hasViewSite()) {
                $site = $contentType->getViewSite();
                if ($site !== null) {
                    $item->site = clone(NotificationRedirectSite::$site);
                    $item->site->addParameter(new NotificationParameter($notificationRow->id));
                }
            }
            $this->addItem($item);

        }

    }

}