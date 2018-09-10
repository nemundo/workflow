<?php

namespace Nemundo\Workflow\App\Message\ContentType;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Message\Parameter\MessageParameter;
use Nemundo\Workflow\App\Message\Site\MessageItemSite;

class MessageContentType extends AbstractContentType
{

    protected function loadData()
    {
       $this->objectName = 'Message';
       $this->objectId = 'a5dbb6c4-61ed-425a-9f24-432b116599f1';
       $this->itemSite = MessageItemSite::$site;
       $this->parameterClass = MessageParameter::class;
    }

}