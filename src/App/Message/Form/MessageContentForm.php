<?php

namespace Nemundo\Workflow\App\Message\Form;


use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Design\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Design\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\Message\Data\Message\Message;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItem;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageText;

class MessageContentForm extends BootstrapForm
{

    /**
     * @var UserListBox
     */
    private $to;

    /**
     * @var BootstrapTextBox
     */
    private $subject;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;


    public function getHtml()
    {

        $this->to = new UserListBox($this);
        $this->to->label = 'To';

        $this->subject = new BootstrapTextBox($this);
        $this->subject->label = 'Subject';

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Message';

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $data = new Message();
        $data->subject = $this->subject->getValue();
        $messageId = $data->save();

        $data = new MessageText();
        $data->text = $this->text->getValue();
        $textId = $data->save();

        $data = new MessageItem();
        $data->messageId = $messageId;
        $data->dataId = $textId;
        $data->contentTypeId = (new TextContentType())->id;
        $data->save();


    }


}