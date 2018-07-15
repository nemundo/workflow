<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;

class WikiPageContentType extends AbstractContentType
{

    protected function loadData()
    {
        $this->name = 'Wiki Page';
        $this->id = 'd6a20e68-3463-491f-a76c-bd8a8df1f57e';
        $this->modelClass = WikiPageModel::class;
    }

}