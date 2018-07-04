<?php

namespace Nemundo\Workflow\App\Wiki\Collection;


use Nemundo\Workflow\App\News\Content\NewsContentType;
use Nemundo\Workflow\App\Wiki\ContentType\HyperlinkContentType;
use Nemundo\Workflow\App\Wiki\ContentType\MailContentType;
use Nemundo\Workflow\App\Wiki\ContentType\WikiNewsContentType;
use Nemundo\Workflow\Content\Collection\AbstractContentTypeCollection;
use Schleuniger\App\Kvp\Process\KvpProcess;
use Schleuniger\App\Kvp\WorkflowStatus\VmErfassung\KvpErfassungWorkflowStatus;

class WikiContentTypeCollection extends AbstractContentTypeCollection
{


    protected function loadCollection()
    {

        $this->addContentType(new MailContentType());
        //$this->addContentType(new NewsContentType());
        $this->addContentType(new WikiNewsContentType());
        $this->addContentType(new KvpErfassungWorkflowStatus());
        //$this->addContentType(new KvpProcess());
        $this->addContentType(new HyperlinkContentType());


    }

}