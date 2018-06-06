<?php

namespace Nemundo\Workflow\Site\Process;


use Nemundo\Com\Html\Basic\H3;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\WorkflowNewSite;
use Nemundo\Workflow\Widget\ProcessOverviewWidget;

class ProcessSite extends AbstractSite
{

    public function loadSite()
    {
        $this->title = 'Process';
        $this->url = 'process';
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new ProcessOverviewWidget($page);

        $page->render();

    }

}