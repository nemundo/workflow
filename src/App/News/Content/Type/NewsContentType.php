<?php

namespace Nemundo\Workflow\App\News\Content\Type;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Workflow\App\News\Content\Form\NewsForm;
use Nemundo\Workflow\App\News\Content\View\NewsContentView;
use Nemundo\Workflow\App\News\Data\News\News;
use Nemundo\Workflow\App\News\Data\News\NewsDelete;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;
use Nemundo\Workflow\App\News\Site\NewsItemSite;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchEngineBuilder;

class NewsContentType extends AbstractTreeContentType  // AbstractModelDataTreeContentType
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $text;


    protected function loadType()
    {

        $this->contentLabel = 'News';
        $this->contentId = '9ba5d00a-682c-42b9-8ce2-26497047feaf';
        $this->contentName = 'news';
        $this->viewSite = NewsItemSite::$site;
        $this->viewClass = NewsContentView::class;
        $this->parameterClass = NewsParameter::class;
        $this->formClass = NewsForm::class;

        //$this->modelClass = NewsModel::class;

    }


    protected function loadData()
    {

        $newsRow = (new NewsReader())->getRowById($this->dataId);

        $this->title = $newsRow->title;
        $this->text = $newsRow->text;

    }


    public function getSubject()
    {
        return $this->title;
    }


    public function saveType()
    {

        //$newsRow = (new NewsReader())->getRowById($this->dataId);

        $data = new News();
        $data->title = $this->title;
        $data->text = $this->text;
        $this->dataId = $data->save();

        $this->saveContentLog();


        $builder = new SearchEngineBuilder($this);
        $builder->addText($this->title);
        $builder->addText($this->text);

        /*
        $builder = new StreamBuilder();
        $builder->contentType = $this;
        $builder->createItem();*/

    }


    public function deleteType()
    {


        $builder = new SearchEngineBuilder($this);
        $builder->removeSearchIndex();

        (new NewsDelete())->deleteById($this->dataId);

    }


    public function importJson($data)
    {

        $this->title = $data[$this->contentName]['title'];
        $this->text = $data[$this->contentName]['text'];
        $this->saveType();

    }


    public function getJson()
    {

        //parent::exportJson();

        //$data[$this->contentName]['content_id'] = $this->contentId;
        //$data[$this->contentName]['data_id'] = $this->dataId;
        $data[$this->contentName]['title'] = $this->title;
        $data[$this->contentName]['text'] = $this->text;

        return $data;

    }


}