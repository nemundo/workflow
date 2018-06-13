<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Container\Start\WorkflowStartContainer;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Form\WorkflowStartForm;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;

class WorkflowNewSite extends AbstractSite
{

    /**
     * @var WorkflowNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'workflow-new';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WorkflowNewSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $processId = (new ProcessParameter())->getValue();
        $processRow = (new ProcessReader())->getRowById($processId);

        $process = $processRow->getProcessClassObject();

        $title = new H1($page);
        $title->content = $processRow->process;

        $p = new Paragraph($page);
        $p->content = $process->description;

        $container = new WorkflowStartContainer($page);
        $container->process = $process;

        /*
        $form = new WorkflowStartForm($page);
        $form->process = $process;
        $form->redirectSite = clone(WorkflowInboxSite::$site);
        $form->redirectSite->addParameter(new ProcessParameter($processId));*/

        $page->render();

    }

}