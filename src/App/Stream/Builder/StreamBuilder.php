<?php

namespace Nemundo\Workflow\App\Stream\Builder;


use Nemundo\App\Content\Builder\AbstractContentBuilder;
use Nemundo\Workflow\App\Inbox\Builder\AbstractNotificationBuilder;
use Nemundo\Workflow\App\Stream\Data\Stream\Stream;

class StreamBuilder extends AbstractContentBuilder
{

    public $message = '';

    public function createItem()
    {

        $data = new Stream();
        $data->contentTypeId = $this->contentType->contentId;
        $data->dataId = $this->contentType->dataId;
        $data->subject = $this->contentType->getSubject();
        $data->message = $this->message;
        $data->save();


    }

}