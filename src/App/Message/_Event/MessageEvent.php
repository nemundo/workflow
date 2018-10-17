<?php

namespace Nemundo\Workflow\App\Message\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Nemundo\Workflow\App\Message\ContentType\AbstractMessageContentType;
use Nemundo\Workflow\App\Message\ContentType\MessageContentType;
use Nemundo\Workflow\App\Message\Data\Message\MessageReader;
use Nemundo\Workflow\App\Message\Data\Message\MessageUpdate;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItem;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItemCount;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class MessageEvent extends AbstractEvent
{

    /**
     * @var AbstractMessageContentType
     */
    public $contentType;

    /**
     * @var string
     */
    public $messageId;

    public function run($id)
    {

        $data = new MessageItem();
        $data->messageId = $this->messageId;
        $data->dataId = $id;
        $data->contentTypeId = $this->contentType->contentId;
        $data->save();

        $messageRow = (new MessageReader())->getRowById($this->messageId);

        /*
                $builder = new NotificationBuilder();
                $builder->contentType = $this->contentType;  // new MessageContentType();
                $builder->dataId = $id;
                $builder->subject = $messageRow->subject;
                $builder->message = $this->contentType->getSubject($id);
                $builder->createUsergroupInbox(new SchleunigerUsergroup());*/


        /*
        $builder = new NotificationBuilder();
        $builder->contentType = new MessageContentType();
        $builder->dataId = $this->messageId;
        $builder->subject = $messageRow->subject;
        $builder->message = $this->contentType->getSubject($id);
        $builder->createUsergroupInbox(new SchleunigerUsergroup());*/


        //$this->contentType->onCreate($id);
        //$this->contentType->onMessageCreate($this->messageId, $id);


        $count = new MessageItemCount();
        $count->filter->andEqual($count->model->messageId, $this->messageId);
        $messageCount = $count->getCount();

        $update = new MessageUpdate();
        $update->count = $messageCount;
        $update->updateById($this->messageId);


    }

}