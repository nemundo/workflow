<?php

namespace Nemundo\Workflow\App\News\Content\Type;


use Nemundo\App\Content\Type\AbstractModelDataContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\News\Data\News\NewsModel;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;
use Nemundo\Workflow\App\News\Site\NewsItemSite;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchEngineBuilder;
use Nemundo\Workflow\App\Stream\Builder\StreamBuilder;

class NewsContentTypeModel extends AbstractModelDataContentType
{

    protected function loadData()
    {

        $this->contentName = 'News';
        $this->contentId = '9ba5d00a-682c-42b9-8ce2-26497047feaf';
        $this->itemSite = NewsItemSite::$site;
        //$this->itemClass = NewsContentItem::class;
        $this->parameterClass = NewsParameter::class;
        $this->modelClass = NewsModel::class;

    }


    public function onCreate($dataId)
    {

        $newsRow = (new NewsReader())->getRowById($dataId);

        $builder = new SearchEngineBuilder();
        $builder->dataId = $newsRow->id;
        $builder->contentType = new NewsContentTypeModel();
        $builder->title = $newsRow->title;
        $builder->text = $newsRow->text;
        $builder->addText($newsRow->title);
        $builder->addText($newsRow->text);

        $builder = new StreamBuilder();
        $builder->contentType = $this;
        $builder->dataId = $dataId;
        $builder->createItem();

    }

}