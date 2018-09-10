<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Core\File\TextFile;
use Nemundo\Project\ProjectConfig;
use Nemundo\Workflow\App\Wiki\Content\Form\WikiPageContentForm;
use Nemundo\Workflow\App\Wiki\Content\Item\WikiPageContentItem;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPage;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;

class WikiPageContentType extends AbstractTreeContentType  // AbstractWikiContentType  // AbstractContentType
{

    public $title;


    protected function loadData()
    {
        $this->objectName = 'Wiki Page';
        $this->objectId = 'd6a20e68-3463-491f-a76c-bd8a8df1f57e';
        //$this->modelClass = WikiPageModel::class;

        $this->formClass = WikiPageContentForm::class;
        $this->itemClass = WikiPageContentItem::class;
        $this->itemSite = WikiPageSite::$site;
        $this->parameterClass = WikiPageParameter::class;

    }



    public function saveItem()
    {

        $data = new WikiPage();
        $data->title = $this->title;
        $this->dataId = $data->save();

        $this->saveContentLog();

        /*
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
        $event->run($id);*/


    }



    public function deleteItem()
    {
        // TODO: Implement deleteItem() method.
    }


    /*
    public function onCreate($dataId)
    {

        $row = (new WikiPageReader())->getRowById($dataId);

        $file = new TextFile();
        $file->overwriteExistingFile = true;
        $file->filename = ProjectConfig::$tmpPath . $row->title . '.txt';
        $file->saveFile();

    }*/


}