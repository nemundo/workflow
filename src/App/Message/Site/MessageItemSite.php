<?php

namespace Nemundo\Workflow\App\Message\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Message\Data\Message\MessageReader;
use Nemundo\Workflow\App\Message\Parameter\MessageParameter;

class MessageItemSite extends AbstractSite
{

    /**
     * @var MessageItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'MessageItem';
        $this->url = 'message-item';
        $this->menuActive = false;

        //new MessageItemSite($this);

    }


    protected function registerSite()
    {
        MessageItemSite::$site = $this;
    }

    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $messageId = (new MessageParameter())->getValue();

        $messageRow = (new MessageReader())->getRowById($messageId);

        $title = new AdminTitle($page);
        $title->content = $messageRow->subject . ' (' . $messageRow->count . ')';

        $p = new Paragraph($page);
        $p->content = $messageRow->text;


        $btn = new AdminButton($page);
        $btn->content = 'Add Document';

        $btn = new AdminButton($page);
        $btn->content = 'Add Text';


        /*
        $text = 'To: ';

        $reader = new MessageToReader();
        $reader->model->loadTo();

        $list = new TextDirectory();
        foreach ($reader->getData() as $row) {
            $list->addValue($row->to->displayName);
            //$text .= ;
        }

        $p = new Paragraph($page);
        $p->content = 'To: ' . $list->getTextWithSeperator(', ');


        $reader = new MessageItemReader();
        $reader->model->loadContentType();
        $reader->model->loadUserCreated();
        $reader->filter->andEqual($reader->model->messageId, $messageId);

        foreach ($reader->getData() as $itemRow) {

            $bold = new Bold($page);
            $bold->content = $itemRow->userCreated->displayName . ' ' . $itemRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat();

            $contentType = $itemRow->contentType->getContentTypeClassObject();

            $item = $contentType->getView($page);
            $item->dataId = $itemRow->dataId;

            (new Hr($page));

        }


        //$contentType = new TextContentType();

        foreach ((new MessageDataTypeCollection())->getContentTypeList() as $contentType) {

            $widget = new AdminWidget($page);
            $widget->widgetTitle = $contentType->contentName;

            $form = $contentType->getForm($widget);
            $form->afterSubmitEvent = new MessageEvent();
            $form->afterSubmitEvent->contentType = $contentType;
            $form->afterSubmitEvent->messageId = $messageId;
        }


        /*
                $form = new MessageReplyForm($page);
                $form->messageId = $messageId;

                $form = new MessageImageForm($page);
                $form->messageId = $messageId;*/


        $page->render();

    }
}