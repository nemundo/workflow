<?php

namespace Nemundo\Workflow\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Com\WorkflowTitle;
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;

class WorkflowStatusChangeSite extends AbstractSite
{

    /**
     * @var WorkflowStatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        WorkflowStatusChangeSite::$site = $this;
    }


    public function loadContent()
    {

        $workflowStatusId = (new WorkflowStatusParameter())->getValue();

        $workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);


        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();

        if ($workflowStatus->modelClassName !== null) {

            $page = (new DefaultTemplateFactory())->getDefaultTemplate();

            $title = new WorkflowTitle($page);
            $title->workflowId = $workflowId;

            $form = null;
            if ($workflowStatus->formClassName !== null) {

                $form = new $workflowStatus->formClassName($page);
                $form->workflowId = $workflowId;

            } else {
                $form = new WorkflowForm($page);
                $form->workflowStatus = $workflowStatus;
                $form->workflowId = $workflowId;
                $form->redirectSite = clone(WorkflowItemSite::$site);
                $form->redirectSite->addParameter($workflowParameter);

            }





            //$form->redirectSite->addParameter($workflowStatus->parameter->setValue($workflowId));

            $page->render();


        } else {

            $workflowStatus->runWorkflow($workflowId);
            (new UrlReferer())->redirect();

        }

    }
}