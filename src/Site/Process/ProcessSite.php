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

        $processReader = new ProcessReader();
        $processReader->addOrder($processReader->model->process);

        foreach ($processReader->getData() as $processRow) {

            $process = $processRow->getProcessClassObject();

            $title = new H3($page);
            $title->content = $process->process;

            $p = new Paragraph($page);
            $p->content = $process->description;

            $btn = new BootstrapButton($page);
            $btn->content = 'Erfassen';
            $btn->site = WorkflowNewSite::$site;
            $btn->site->addParameter(new ProcessParameter($process->processId));

        }

        $page->render();

    }

}