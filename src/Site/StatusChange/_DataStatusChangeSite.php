<?php

namespace Nemundo\Workflow\Site\StatusChange;

use Nemundo\Com\Html\Basic\H2;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;

class DataStatusChangeSite extends AbstractSite
{

    /**
     * @var DataStatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'data-status-change';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        DataStatusChangeSite::$site = $this;
    }


    public function loadContent()
    {

        $workflowStatusId = (new WorkflowStatusParameter())->getValue();

        $workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);


        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();


        // Action Panel Redirect
        if ($workflowStatus->actionPanelClassName !== null) {

            $workflowStatus->draftMode = true;
            $statusChangeId = $workflowStatus->runWorkflow($workflowId);

            $site = clone(WorkflowActionPanelSite::$site);
            $site->addParameter(new WorkflowStatusChangeParameter($statusChangeId));
            $site->redirect();

        }


        if ($workflowStatus->modelClassName !== null) {

            $page = (new DefaultTemplateFactory())->getDefaultTemplate();

            $title = new WorkflowTitle($page);
            $title->workflowId = $workflowId;


            /*
            $link = new Hyperlink($page);
            $link->content = 'Zum Workflow';
            $link->site = clone(WorkflowItemSite::$site);
            $link->site->addParameter($workflowParameter);*/


            $h2 = new H2($page);
            $h2->content = $workflowStatus->workflowStatus;


            $form = null;
            if ($workflowStatus->formClassName !== null) {

                $workflowStatus->draftMode = true;
                $workflowStatus->runWorkflow($workflowId);

                $form = new $workflowStatus->formClassName($page);
                $form->workflowId = $workflowId;

            } else {

                $form = new WorkflowForm($page);
                $form->workflowStatus = $workflowStatus;
                $form->workflowId = $workflowId;
                $form->redirectSite = clone(WorkflowItemSite::$site);
                $form->redirectSite->addParameter($workflowParameter);

            }

            $page->render();


        } else {

            $workflowStatus->runWorkflow($workflowId);
            (new UrlReferer())->redirect();

        }

    }
}