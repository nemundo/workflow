<?php

namespace Nemundo\Workflow\App\News\Content\Data;


use Nemundo\Workflow\App\News\Content\Type\NewsContentTypeModel;
use Nemundo\Workflow\App\News\Data\News\News;

class NewsContent extends News
{

    public function save()
    {

        $id = parent::save();
        (new NewsContentTypeModel())->onCreate($id);
        return $id;

    }

}