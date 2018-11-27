<?php

namespace Nemundo\Workflow\App\Message\ContentType;


use Nemundo\Workflow\App\Message\Data\Message\MessageModel;
use Nemundo\Workflow\App\Message\Data\Message\MessageReader;
use Nemundo\Workflow\App\Message\Parameter\MessageParameter;
use Nemundo\Workflow\App\Message\Site\MessageItemSite;
use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;


class MessageContentType extends AbstractModelDataWorkflowStatus  // AbstractModelDataContentType
{

    protected function loadType()
    {
        $this->contentLabel = 'Message';
        $this->contentId = 'a5dbb6c4-61ed-425a-9f24-432b116599f1';
        $this->viewSite = MessageItemSite::$site;
        $this->parameterClass = MessageParameter::class;
        $this->modelClass = MessageModel::class;
    }


    public function onCreate()
    {

        $this->saveContentLog();

        $row = (new MessageReader())->getRowById($this->dataId);

        $builder = new NotificationBuilder($this);
        $builder->message = $row->text;
        $builder->createUserNotification($row->toId);

    }


    public function getSubject()
    {

        $row = (new MessageReader())->getRowById($this->dataId);
        $subject = $row->subject;
        return $subject;

    }

}