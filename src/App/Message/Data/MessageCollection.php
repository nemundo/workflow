<?php

namespace Nemundo\Workflow\App\Message\Data;

use Nemundo\Model\Collection\AbstractModelCollection;

class MessageCollection extends AbstractModelCollection
{
    protected function loadCollection()
    {
        $this->addModel(new \Nemundo\Workflow\App\Message\Data\MessageItem\MessageItemModel());
        $this->addModel(new \Nemundo\Workflow\App\Message\Data\Message\MessageModel());
        $this->addModel(new \Nemundo\Workflow\App\Message\Data\MessageDocument\MessageDocumentModel());
        $this->addModel(new \Nemundo\Workflow\App\Message\Data\MessageImage\MessageImageModel());
        $this->addModel(new \Nemundo\Workflow\App\Message\Data\MessageType\MessageTypeModel());
        $this->addModel(new \Nemundo\Workflow\App\Message\Data\MessageText\MessageTextModel());
        $this->addModel(new \Nemundo\Workflow\App\Message\Data\MessageTo\MessageToModel());
    }
}