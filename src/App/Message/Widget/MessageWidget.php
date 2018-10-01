<?php

namespace Nemundo\Workflow\App\Message\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Workflow\App\Message\ContentType\MessageContentType;

class MessageWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {

    }

    public function getHtml()
    {

        $this->widgetTitle = 'Message';

        (new MessageContentType())->getForm($this);

        return parent::getHtml();
    }

}