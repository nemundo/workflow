<?php

namespace Nemundo\Workflow\App\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\Site\StatusChange\StatusChangeSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Com\Button\NemundoButton;

class WorkflowActionButton extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractSite
     */
    public $statusChangeRedirectSite;


    public function getHtml()
    {

        if ($this->statusChangeRedirectSite == null) {
            (new LogMessage())->writeError('WorkflowActionButton: No site defined.');
            return parent::getHtml();
        }


        //$workflowItem = new WorkflowItem($this->workflowId);

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        /** @var AbstractWorkflowStatus $workflowStatus */
        $workflowStatus = $workflowRow->workflowStatus->getContentTypeClassObject();

        foreach ($workflowStatus->getFollowingStatusClassList() as $className) {
        //foreach ($workflowItem->workflowStatus->getFollowingStatusClassList($this->workflowId) as $className) {

            /** @var AbstractWorkflowStatus $followingStatusClass */
            $followingStatusClass = new $className();

           // $label = $followingStatusClass->actionLabel;
            //if ($label == null) {
                $label = $followingStatusClass->name;
           // }

            $btn = new AdminButton($this);
            $btn->content = $label;

            //$site = null;

            //$site = clone(StatusChangeSite::$site);

            /*
            if ($followingStatusClass->formSite == null) {
                $site = clone(StatusChangeSite::$site);
            } else {
                $site = clone($followingStatusClass->formSite);
            }*/


            //$btn->site = $site;
            $btn->site = clone($this->statusChangeRedirectSite);
            $btn->site->addParameter(new ContentTypeParameter($followingStatusClass->id));
            $btn->site->addParameter(new WorkflowParameter($this->workflowId));


            /*
            $btn->restricted = $followingStatusClass->restricted;
            foreach ($followingStatusClass->getRestrictedUsergroupList() as $usergroup) {
                $btn->addRestrictedUsergroup($usergroup);
            }*/

            //$btn->disabled = true;

        }

        return parent::getHtml();

    }

}