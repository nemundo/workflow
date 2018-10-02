<?php

namespace Nemundo\Workflow\App\Wiki\ContentType;


use Nemundo\Package\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\Workflow\App\Wiki\ContentItem\MailContentView;
use Nemundo\Workflow\App\Wiki\Data\Mail\MailModel;
use Nemundo\Workflow\App\Wiki\Data\Mail\MailReader;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;
use Nemundo\Workflow\App\Wiki\Site\WikiRedirectSite;

class MailContentType extends AbstractContentType
{

    protected function loadData()
    {

        $this->contentName = 'Mail';
        $this->contentId = 'ffa2fb24-f736-4821-ae28-3b9ad30b7c08';
        $this->modelClass = MailModel::class;
        $this->viewClass = MailContentView::class;
        $this->viewSite = WikiRedirectSite::$site;

    }


    public function onCreate($dataId)
    {


        $reader = new WikiReader();
        $reader->model->loadPage();
        $reader->filter->andEqual($reader->model->dataId, $dataId);
        $wikiRow = $reader->getRow();


        $row = (new MailReader())->getRowById($dataId);

        $mail = new ResponsiveActionMailMessage();
        $mail->addTo($row->to);
        $mail->subject = $row->subject.' ('.$wikiRow->page->title.')' ;
        $mail->sendMail();

    }


}