<?php

namespace Nemundo\Workflow\App\News\Content;


use Nemundo\Workflow\App\News\Data\News\NewsModel;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;
use Nemundo\Workflow\App\News\Site\NewsItemSite;
use Nemundo\App\Content\Type\AbstractContentType;

class NewsContentType extends AbstractContentType
{

    protected function loadData()
    {

        $this->name = 'News';
        $this->id = '9ba5d00a-682c-42b9-8ce2-26497047feaf';
        $this->itemSite = NewsItemSite::$site;
        $this->itemClass = NewsContentItem::class;
        $this->parameterClass = NewsParameter::class;
        $this->modelClass = NewsModel::class;

    }

}