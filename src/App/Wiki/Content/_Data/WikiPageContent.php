<?php

namespace Nemundo\Workflow\App\Wiki\Content\Data;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\LargeTextTemplateContent;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPage;
use Nemundo\Workflow\App\Wiki\Event\WikiEvent;
use Paranautik\App\Beta\Process\BetaProcess;
use Paranautik\App\Beta\Process\BetaProcessContent;

class WikiPageContent extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $teaser;


    public function save()
    {

        $data = new WikiPage();
        $data->title = $this->title;
        $pageId = $data->save();

        $contentType = new WikiPageContentType();
        $contentType->onCreate($pageId);

        $content = new LargeTextTemplateContent();
        $content->text = $this->teaser;
        $id = $content->save();

        $event = new WikiEvent();
        $event->contentType = new LargeTextTemplateContentType();
        $event->pageId = $pageId;
        $event->run($id);


        $content = new BetaProcessContent();
        $content->name = 'Klang';
        $content->vorname = 'Kurs';
        $content->email = 'klang@kurs.ch';
        $id = $content->save();

        $event = new WikiEvent();
        $event->contentType = new BetaProcess();
        $event->pageId = $pageId;
        $event->run($id);


    }


}