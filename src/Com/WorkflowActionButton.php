<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\Site\WorkflowStatusChangeSite;
use Nemundo\Workflow\Status\AbstractWorkflowStatus;
use Schleuniger\Com\Button\SchleunigerButton;

class WorkflowActionButton extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowStatus
     */
    //public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();

        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $workflowStatus = $workflowRow->workflowStatus->getWorkflowStatusClassObject();
        $workflowStatus->workflowId = $this->workflowId;


        foreach ($workflowStatus->getFollowingStatusClassList() as $className) {

            /** @var AbstractWorkflowStatus $followingStatusClass */
            $followingStatusClass = new $className();

            $btn = new SchleunigerButton($this);
            $btn->content = $followingStatusClass->statusLabel;

            $site = null;

            if ($followingStatusClass->formSite == null) {
                $site = clone(WorkflowStatusChangeSite::$site);
            } else {
                $site = clone($followingStatusClass->formSite);
            }

            $site->addParameter(new WorkflowStatusParameter($followingStatusClass->statusId));
            //$site->addParameter($workflowStatus->parameter->setValue($this->workflowId));
            $site->addParameter(new WorkflowParameter($this->workflowId));

            $btn->site = $site;

            $btn->restricted = $followingStatusClass->restricted;
            foreach ($followingStatusClass->getRestrictedUsergroupList() as $usergroup) {
                $btn->addRestrictedUsergroup($usergroup);
             }

            //$btn->disabled = true;

        }

        return parent::getHtml();

    }

}