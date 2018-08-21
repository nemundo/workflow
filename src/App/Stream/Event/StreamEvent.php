<?php

namespace Nemundo\Workflow\App\Stream\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Stream\Builder\StreamBuilder;

class StreamEvent extends AbstractEvent
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public function run($id)
    {

        $builder = new StreamBuilder();
        $builder->contentType = $this->contentType;
        $builder->dataId = $id;
        $builder->createItem();

    }

}