<?php

namespace Nemundo\Workflow\Site\Release;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Builder\DraftRelease;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeUpdate;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;

class DraftReleaseSite extends AbstractSite
{

    /**
     * @var DraftReleaseSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'draft-release';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        DraftReleaseSite::$site = $this;
    }

    public function loadContent()
    {

        // by workflowId

        $workflowId = (new WorkflowParameter())->getValue();
        (new DraftRelease())->releaseDraft($workflowId);


        /*
        $statusChangeId = (new WorkflowStatusChangeParameter())->getValue();

        $changeReader = new WorkflowStatusChangeReader();
        $changeReader->model->loadWorkflow();
        //$changeReader->model->workflow->loadProcess();
        $changeRow = $changeReader->getRowById($statusChangeId);*/

        //$process = $changeRow->workflow->process->getProcessClassObject();
/*
        $update = new WorkflowStatusChangeUpdate();
        $update->filter->andEqual($update->model->workflowId, $workflowId);
        $update->draft = false;
        $update->update();

        $update = new WorkflowUpdate();
        $update->draft = false;
        $update->updateById($workflowId);

        /*
        $site = clone($process->site);
        $site->addParameter(new WorkflowParameter($changeRow->workflowId));
        $site->redirect();*/


        (new UrlReferer())->redirect();


    }

}