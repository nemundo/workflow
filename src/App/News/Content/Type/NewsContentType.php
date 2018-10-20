<?php

namespace Nemundo\Workflow\App\News\Content\Type;


use Nemundo\App\Content\Type\AbstractModelDataTreeContentType;
use Nemundo\Workflow\App\News\Content\View\NewsContentView;
use Nemundo\Workflow\App\News\Data\News\NewsModel;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;
use Nemundo\Workflow\App\News\Site\NewsItemSite;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchEngineBuilder;
use Nemundo\Workflow\App\Stream\Builder\StreamBuilder;

class NewsContentType extends AbstractModelDataTreeContentType
{

    protected function loadType()
    {

        $this->contentName = 'News';
        $this->contentId = '9ba5d00a-682c-42b9-8ce2-26497047feaf';
        $this->viewSite = NewsItemSite::$site;
        $this->viewClass = NewsContentView::class;
        $this->parameterClass = NewsParameter::class;
        $this->modelClass = NewsModel::class;

    }


    public function onCreate()
    {

        $newsRow = (new NewsReader())->getRowById($this->dataId);

        $builder = new SearchEngineBuilder();
        $builder->contentType = $this;
        $builder->addText($newsRow->title);
        $builder->addText($newsRow->text);

        $builder = new StreamBuilder();
        $builder->contentType = $this;
        $builder->createItem();

    }

}