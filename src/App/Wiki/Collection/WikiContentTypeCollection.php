<?php

namespace Nemundo\Workflow\App\Wiki\Collection;


use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;


class WikiContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $this->addContentType(new LargeTextTemplateContentType());
        $this->addContentType(new ToDoProcess());

    }

}