<?php

namespace Nemundo\Workflow\App\Message\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Workflow\App\Message\ContentType\ImageContentType;
use Nemundo\Workflow\App\Message\Data\MessageImage\MessageImageModel;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItem;


class MessageImageForm extends BootstrapModelForm
{

    /**
     * @var string
     */
    public $messageId;


    public function getHtml()
    {

        $this->model = new MessageImageModel();

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $dataId = parent::onSubmit();

        $data = new MessageItem();
        $data->messageId = $this->messageId;
        $data->dataId = $dataId;
        $data->contentTypeId = (new ImageContentType())->objectId;
        $data->save();

    }


}