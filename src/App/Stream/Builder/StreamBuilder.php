<?php

namespace Nemundo\Workflow\App\Stream\Builder;


use Nemundo\App\Content\Builder\AbstractContentBuilder;
use Nemundo\Workflow\App\Inbox\Builder\AbstractInboxBuilder;
use Nemundo\Workflow\App\Stream\Data\Stream\Stream;

class StreamBuilder extends AbstractContentBuilder
{


    public function createItem()
    {

        $data = new Stream();
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $this->dataId;
        $data->save();


    }

}