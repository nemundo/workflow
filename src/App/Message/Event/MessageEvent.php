<?php

namespace Nemundo\Workflow\App\Message\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Html\Form\Event\AbstractAfterSubmitEvent;
use Nemundo\Workflow\App\Message\ContentType\AbstractMessageContentType;
use Nemundo\Workflow\App\Message\Data\Message\MessageUpdate;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItem;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItemCount;

class MessageEvent extends AbstractAfterSubmitEvent
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
        $data->contentTypeId = $this->contentType->id;
        $data->save();

        //$this->contentType->onCreate($id);
        $this->contentType->onMessageCreate($this->messageId, $id);

        /*
        $count = new MessageItemCount();
        $count->filter->andEqual($count->model->messageId, $this->messageId);
        $messageCount = $count->getCount();

        $update = new MessageUpdate();
        $update->count = $messageCount;
        $update->updateById($this->messageId);*/




    }

}