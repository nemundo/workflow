<?php

namespace Nemundo\Workflow\App\Message\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\Message\Data\Message\Message;
use Nemundo\Workflow\App\Message\Data\MessageItem\MessageItem;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageText;
use Nemundo\Workflow\App\Message\Data\MessageTo\MessageTo;
use Nemundo\Workflow\App\Message\Parameter\MessageParameter;
use Nemundo\Workflow\App\Message\Site\MessageItemSite;

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
        $this->to->validation = true;

        $this->subject = new BootstrapTextBox($this);
        $this->subject->label = 'Subject';
        $this->subject->validation = true;
        $this->subject->autofocus = true;

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Message';

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $data = new Message();
        $data->subject = $this->subject->getValue();
        $messageId = $data->save();

        if ($this->text->getValue() !== '') {

            $data = new MessageText();
            $data->text = $this->text->getValue();
            $textId = $data->save();

            $data = new MessageItem();
            $data->messageId = $messageId;
            $data->dataId = $textId;
            $data->contentTypeId = (new TextContentType())->id;
            $data->save();

        }


        $data = new MessageTo();
        $data->messageId = $messageId;
        $data->toId = (new UserInformation())->getUserId();
        $data->save();

        $data = new MessageTo();
        $data->messageId = $messageId;
        $data->toId = $this->to->getValue();
        $data->save();



        $site = clone(MessageItemSite::$site);
        $site->addParameter(new MessageParameter($messageId));
        $site->redirect();


    }


}