<?php

namespace Nemundo\Workflow\App\Message\Collection;


use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Workflow\App\Message\ContentType\ImageContentType;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;

class MessageDataTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $this->addContentType(new TextContentType());
        $this->addContentType(new ImageContentType());
        $this->addContentType(new PersonalTaskProcess());

    }

}