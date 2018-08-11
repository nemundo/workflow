<?php

namespace Nemundo\Workflow\App\Message\ContentType;


use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Message\ContentItem\ImageContentItem;
use Nemundo\Workflow\App\Message\ContentItem\TextContentItem;
use Nemundo\Workflow\App\Message\Data\Message\MessageReader;
use Nemundo\Workflow\App\Message\Data\MessageImage\MessageImageForm;
use Nemundo\Workflow\App\Message\Data\MessageImage\MessageImageModel;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageTextReader;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class ImageContentType extends AbstractMessageContentType
{

    protected function loadData()
    {
        $this->name = 'Image';
        $this->subject = 'Neues Bild';
        $this->id = '54944a0b-58c3-466b-99f2-4cd5431c91e5';
        $this->itemClass = ImageContentItem::class;
        //$this->formClass = MessageImageForm::class;

        $this->modelClass = MessageImageModel::class;

    }


    public function onMessageCreate($messageId, $dataId)
    {

        $messageRow = (new MessageReader())->getRowById($messageId);
        //$textRow = (new MessageTextReader())->getRowById($dataId);


        $builder = new InboxBuilder();
        $builder->contentType = new MessageContentType();
        $builder->dataId = $messageId;
        $builder->subject = $messageRow->subject;
        $builder->message = 'Neues Bild';
        $builder->createUsergroupInbox(new SchleunigerUsergroup());



    }

}