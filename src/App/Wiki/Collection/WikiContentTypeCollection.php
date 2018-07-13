<?php

namespace Nemundo\Workflow\App\Wiki\Collection;


use Nemundo\Workflow\App\Message\ContentType\ImageContentType;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\News\Content\NewsContentType;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\ToDo\Content\ToDoContentType;
use Nemundo\Workflow\App\Wiki\ContentType\HyperlinkContentType;
use Nemundo\Workflow\App\Wiki\ContentType\MailContentType;
use Nemundo\Workflow\App\Wiki\ContentType\WikiNewsContentType;
use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Paranautik\App\Meteoschweiz\Content\AllgemeineLageContentType;
use Paranautik\App\Sat24\Content\Type\Sat24ContentType;
use Schleuniger\App\Kvp\Process\KvpProcess;
use Schleuniger\App\Kvp\WorkflowStatus\VmErfassung\KvpErfassungWorkflowStatus;

class WikiContentTypeCollection extends AbstractContentTypeCollection
{


    protected function loadCollection()
    {


        //$this->addContentType(new ToDoContentType());


        $this->addContentType(new PersonalTaskProcess());

        //$this->addContentType(new MailContentType());

        /* $this->addContentType(new HyperlinkContentType());
        //$this->addContentType(new KvpErfassungWorkflowStatus());
        $this->addContentType(new WikiNewsContentType());
        //$this->addContentType(new KvpProcess());


        $this->addContentType(new TextContentType());
        $this->addContentType(new ImageContentType());

        $this->addContentType(new AllgemeineLageContentType());
        $this->addContentType(new \Paranautik\App\News\Content\NewsContentType());*/
        $this->addContentType(new Sat24ContentType());

    }

}