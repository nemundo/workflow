<?php

namespace Nemundo\Workflow\App\Wiki\Collection;


use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\App\Content\Type\AbstractContentTypeContainer;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Content\Type\TextListType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;
use Paranautik\App\Meteoschweiz\Content\Type\AllgemeineLageAktuellContentType;
use Paranautik\App\TestApp\Content\LandContentType;
use Paranautik\App\TestApp\Content\SlideshowContentType;
use Schleuniger\App\Absenzmeldung\WorkflowStatus\AbsenzmeldungType;
use Schleuniger\App\Ecr\Process\Ecr\EcrWorkflowProcess;
use Schleuniger\App\Kvp\Process\KvpProcess;
use Schleuniger\App\Task\Content\Type\TaskListType;
use Schleuniger\App\Task\Content\Type\TaskType;


class WikiContentTypeCollection extends AbstractContentTypeCollection
{


    protected function loadCollection()
    {

        $this->addContentType(new LargeTextTemplateContentType());
        $this->addContentType(new ImageTemplateContentType());
        //$this->addContentType(new KvpProcess());
        $this->addContentType(new EcrWorkflowProcess());
        $this->addContentType(new TaskType());
        $this->addContentType(new AbsenzmeldungType());
        $this->addContentType(new TextListType());
        $this->addContentType(new TaskListType());

    }


}