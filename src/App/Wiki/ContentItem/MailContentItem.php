<?php

namespace Nemundo\Workflow\App\Wiki\ContentItem;


use Nemundo\Com\Html\Basic\Bold;
use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Workflow\App\Wiki\Data\Mail\MailReader;
use Nemundo\App\Content\Item\AbstractContentItem;

class MailContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        $row = (new MailReader())->getRowById($this->dataId);


        $email = new EmailHyperlink($this);
        $email->email = $row->to;

        $bold = new Bold($this);
        $bold->content = $row->subject;



        return parent::getHtml();
    }


}