<?php

namespace Nemundo\Workflow\App\News\Content\Data;


use Nemundo\Workflow\App\News\Content\Type\NewsContentType;
use Nemundo\Workflow\App\News\Data\News\News;

class NewsContent extends News
{

    public function save()
    {

        $dataId = parent::save();

        $contentType = new NewsContentType($dataId);
        $contentType->onCreate();

        //(new NewsContentType())->onCreate();
        return $dataId;

    }

}