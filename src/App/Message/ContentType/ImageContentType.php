<?php

namespace Nemundo\Workflow\App\Message\ContentType;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Message\ContentItem\ImageContentView;
use Nemundo\Workflow\App\Message\Data\Message\MessageReader;
use Nemundo\Workflow\App\Message\Data\MessageImage\MessageImageForm;
use Nemundo\Workflow\App\Message\Data\MessageImage\MessageImageModel;
use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class ImageContentType extends AbstractContentType
{

    protected function loadType()
    {
        $this->contentLabel = 'Image';
        $this->subject = 'Neues Bild';
        $this->contentId = '54944a0b-58c3-466b-99f2-4cd5431c91e5';
        $this->viewClass = ImageContentView::class;
        //$this->formClass = MessageImageForm::class;

        $this->modelClass = MessageImageModel::class;

    }


    public function onMessageCreate($messageId, $dataId)
    {

        $messageRow = (new MessageReader())->getRowById($messageId);
        //$textRow = (new MessageTextReader())->getRowById($dataId);


        $builder = new NotificationBuilder();
        $builder->contentType = new MessageContentType();
        $builder->dataId = $messageId;
        $builder->subject = $messageRow->subject;
        $builder->message = 'Neues Bild';
        $builder->createUsergroupNotification(new SchleunigerUsergroup());


    }

}