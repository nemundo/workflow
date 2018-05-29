<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Com\Html\Basic\H1;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Parameter\ProcessParameter;

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

        $title = new H1($page);
        $title->content = $processRow->process;


        $process = $processRow->getProcessClassObject();


        //$form = new WorkflowForm($this);
        //$form->application = new FluggebietProposalProcess();
        //$form->workflowStatus = new FluggebietErfassungWorkflowStatus();

        $form = new WorkflowForm($page);
        $form->process = $process;
        $form->workflowStatus = $process->startWorkflowStatus;
        $form->redirectSite = WorkflowSite::$site;


        $page->render();


    }

}