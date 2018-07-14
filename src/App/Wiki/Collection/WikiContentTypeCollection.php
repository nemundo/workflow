<?php

namespace Nemundo\Workflow\App\Wiki\Container;


use Nemundo\App\Content\Type\AbstractContentTypeContainer;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;


class WikiContainer extends AbstractContentTypeContainer
{


    protected function loadData()
    {

        $this->name = 'Wiki';
        $this->id = '6b6a055b-6e6c-46ca-832c-3a91a0833848';
        $this->modelClass = WikiPageModel::class;


    }


}