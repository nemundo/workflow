<?php

namespace Nemundo\Workflow\App\Wiki\ContentType;


use Nemundo\Design\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\Workflow\App\Wiki\ContentItem\MailContentItem;
use Nemundo\Workflow\App\Wiki\Data\Mail\MailModel;
use Nemundo\Workflow\App\Wiki\Data\Mail\MailReader;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;
use Nemundo\Workflow\App\Wiki\Site\WikiRedirectSite;

class MailContentType extends AbstractContentType
{

    protected function loadData()
    {

        $this->name = 'Mail';
        $this->id = 'ffa2fb24-f736-4821-ae28-3b9ad30b7c08';
        $this->modelClass = MailModel::class;
        $this->itemClass = MailContentItem::class;
        $this->itemSite = WikiRedirectSite::$site;

    }


    public function onCreate($dataId)
    {

        $row = (new MailReader())->getRowById($dataId);

        $mail = new ResponsiveActionMailMessage();
        $mail->addTo($row->to);
        $mail->subject = $row->subject;
        $mail->sendMail();

    }


}