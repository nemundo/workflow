<?php

namespace Nemundo\Workflow\App\Wiki\Collection;


use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\App\Content\Type\AbstractContentTypeContainer;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;
use Paranautik\App\Meteoschweiz\Content\Type\AllgemeineLageAktuellContentType;
use Paranautik\App\TestApp\Content\LandContentType;
use Paranautik\App\TestApp\Content\SlideshowContentType;
use Schleuniger\App\Kvp\Process\KvpProcess;


class WikiContentTypeCollection extends AbstractContentTypeCollection
{


    protected function loadCollection()
    {

        $this->addContentType(new LargeTextTemplateContentType());
        $this->addContentType(new ImageTemplateContentType());
        $this->addContentType(new KvpProcess());

    }


}