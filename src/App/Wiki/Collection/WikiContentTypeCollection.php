<?php

namespace Nemundo\Workflow\App\Wiki\Collection;


use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\App\Content\Type\AbstractContentTypeContainer;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;


class WikiContentTypeCollection extends AbstractContentTypeCollection
{


    protected function loadCollection()
    {

        $this->addContentType(new LargeTextTemplateContentType());
        $this->addContentType(new ImageTemplateContentType());


    }


}