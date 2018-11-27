<?php

namespace Nemundo\Workflow\App\ContentTemplate\Data;

use Nemundo\Model\Collection\AbstractModelCollection;

class ContentTemplateCollection extends AbstractModelCollection
{
    protected function loadCollection()
    {
        $this->addModel(new \Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate\FileContentTemplateModel());
        $this->addModel(new \Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate\ImageContentTemplateModel());
        $this->addModel(new \Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate\LargeTextContentTemplateModel());
        $this->addModel(new \Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate\TextContentTemplateModel());
    }
}