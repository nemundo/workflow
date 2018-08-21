<?php

namespace Nemundo\Workflow\App\News\Content\Data;


use Nemundo\Workflow\App\News\Content\Type\NewsContentType;
use Nemundo\Workflow\App\News\Data\News\News;

class NewsContent extends News
{

    public function save()
    {

        $id = parent::save();
        (new NewsContentType())->onCreate($id);
        return $id;

    }

}