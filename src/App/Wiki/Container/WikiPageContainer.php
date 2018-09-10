<?php

namespace Nemundo\Workflow\App\Wiki\ContentType;


use Nemundo\Workflow\App\Wiki\ContentItem\WikiContentItem;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;
use Nemundo\App\Content\Type\AbstractContentType;

class WikiPageContainer extends AbstractContentType
{

    protected function loadData()
    {

        $this->objectName = 'Wiki';
        $this->objectId = 'f40aefbc-3f4f-4d15-b27a-8139eccb162a';
        $this->itemClass = WikiContentItem::class;
        $this->itemSite = WikiPageSite::$site;
        $this->parameterClass = WikiPageParameter::class;

    }

}