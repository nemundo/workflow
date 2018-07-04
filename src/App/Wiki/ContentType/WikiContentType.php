<?php

namespace Nemundo\Workflow\App\Wiki\ContentType;


use Nemundo\Workflow\App\Wiki\ContentItem\WikiContentItem;
use Nemundo\Workflow\App\Wiki\Parameter\PageParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;
use Nemundo\Workflow\Content\Type\AbstractContentType;

class WikiContentType extends AbstractContentType
{

    protected function loadData()
    {

        $this->name = 'Wiki';
        $this->id = 'f40aefbc-3f4f-4d15-b27a-8139eccb162a';
        $this->itemClass = WikiContentItem::class;
        $this->itemSite = WikiPageSite::$site;
        $this->parameterClass = PageParameter::class;

    }

}