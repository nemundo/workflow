<?php

namespace Nemundo\Workflow\App\Message\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\Message\Data\Message\Message;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItem;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageText;

class MessageReplyForm extends BootstrapForm
{

    /**
     * @var string
     */
    public $messageId;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;


    public function getHtml()
    {

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Message';

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $data = new MessageText();
        $data->text = $this->text->getValue();
        $textId = $data->save();

        $data = new MessageItem();
        $data->messageId = $this->messageId;
        $data->dataId = $textId;
        $data->contentTypeId = (new TextContentType())->id;
        $data->save();

    }


}