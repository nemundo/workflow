<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeUpdate;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;

class WorkflowDraftFreigabeSite extends AbstractSite
{

    /**
     * @var WorkflowDraftFreigabeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'draft-freigabe';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WorkflowDraftFreigabeSite::$site = $this;
    }

    public function loadContent()
    {

        $statusChangeId = (new WorkflowStatusChangeParameter())->getValue();

        $changeReader = new WorkflowStatusChangeReader();
        $changeReader->model->loadWorkflow();
        //$changeReader->model->workflow->loadProcess();
        $changeRow = $changeReader->getRowById($statusChangeId);

        //$process = $changeRow->workflow->process->getProcessClassObject();

        $update = new WorkflowStatusChangeUpdate();
        $update->draft = false;
        $update->updateById($statusChangeId);

        $update = new WorkflowUpdate();
        $update->draft = false;
        $update->updateById($changeRow->workflowId);

        /*
        $site = clone($process->site);
        $site->addParameter(new WorkflowParameter($changeRow->workflowId));
        $site->redirect();*/


        (new UrlReferer())->redirect();


    }

}