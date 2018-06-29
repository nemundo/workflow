<?php

namespace Nemundo\Workflow\Stream\Builder;


use Nemundo\Workflow\App\Stream\Data\Stream\Stream;
use Nemundo\Workflow\Content\Builder\AbstractContentBuilder;
use Nemundo\Workflow\Content\Type\AbstractContentType;
use Nemundo\Workflow\Stream\Type\AbstractStreamType;

class StreamBuilder extends AbstractContentBuilder
{

    /**
     * @var string
     */
    public $subject;

    public function createItem() {

        $this->check();

        $data = new Stream();
        $data->ignoreIfExists = true;
        $data->dataId = $this->dataId;
        $data->contentTypeId = $this->contentType->id;
        $data->subject = $this->subject;
        $data->save();

        $this->contentType->onCreate();


    }



}