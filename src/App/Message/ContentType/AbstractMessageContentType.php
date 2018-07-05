<?php

namespace Nemundo\Workflow\App\Message\ContentType;


use Nemundo\App\Content\Type\AbstractContentType;

abstract class AbstractMessageContentType extends AbstractContentType
{

    public function onMessageCreate($messageId, $dataId) {

    }

}