<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Design\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Design\Bootstrap\Layout\BootstrapRow;
use Nemundo\Design\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Com\Item\WorkflowDefaultWorkflowItem;
use Nemundo\Workflow\Com\View\WorkflowModelView;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Site\WorkflowDraftFreigabeSite;
use Nemundo\Workflow\Site\WorkflowFormUpdateSite;


class WorkflowItemList extends AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var bool
     */
    public $showSubscription = false;

    /**
     * @var bool
     */
    public $showBaseData = true;


    public function getHtml()
    {

        if (!$this->checkProperty('workflowId')) {
            exit;
        }

        if (!$this->checkObject('process', $this->process, AbstractProcess::class)) {
            exit;
        }


        $title = new WorkflowTitle($this);
        $title->workflowId = $this->workflowId;

        if ($this->showSubscription) {

            $btn = new SubscriptionButton($this);
            $btn->applicationType = $this->process;
            $btn->workflowId = $this->workflowId;

        }


        if ($this->showBaseData) {

            $h3 = new H5($this);
            $h3->content = 'Workflow Data';

            /** @var AbstractWorkflowBaseModel $model */
            $model = (new ModelFactory())->getModelByClassName($this->process->baseModelClassName);

            $view = new WorkflowModelView($this);
            $view->model = $model;
            $view->filter->andEqual($model->workflowId, $this->workflowId);
        }


        $h3 = new H5($this);
        $h3->content = 'User Assignment';

        $list = new UnorderedList($this);

        $assignmentReader = new UserAssignmentReader();
        $assignmentReader->model->loadUser();
        $assignmentReader->filter->andEqual($assignmentReader->model->workflowId, $this->workflowId);


        foreach ($assignmentReader->getData() as $assignmentRow) {
            $list->addText($assignmentRow->user->login);
        }


        $h3 = new H5($this);
        $h3->content = 'Usergroup Assignment';

        $list = new UnorderedList($this);

        $assignmentReader = new UsergroupAssignmentReader();
        $assignmentReader->model->loadUsergroup();
        $assignmentReader->filter->andEqual($assignmentReader->model->workflowId, $this->workflowId);

        foreach ($assignmentReader->getData() as $assignmentRow) {
            $list->addText($assignmentRow->usergroup->usergroup);
        }


        $h3 = new H5($this);
        $h3->content = 'Workflow History';


        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;

        $list = new BootstrapHyperlinkList($colLeft);

        $changeReader = new WorkflowStatusChangeReader();
        $changeReader->model->loadWorkflowStatus();
        $changeReader->model->loadUser();
        $changeReader->filter->andEqual($changeReader->model->workflowId, $this->workflowId);
        foreach ($changeReader->getData() as $changeRow) {

            $workflowStatus = $changeRow->workflowStatus->getWorkflowStatusClassObject();
            //$workflowStatus->workflowId = $changeRow->workflowId;
            //$workflowStatus->workflowItemId = $changeRow->workflowItemId;

            $statusLabel = $workflowStatus->workflowStatus;
            if ($changeRow->draft) {
                $statusLabel .= ' (Entwurf)';
            }


            $list->addHyperlink($statusLabel, '#' . $changeRow->id);

            if ($workflowStatus->workflowItemClassName !== null) {

                /** @var WorkflowItem $item */
                $item = new $workflowStatus->workflowItemClassName($colRight);
                $item->id = $changeRow->id;
                $item->title = $workflowStatus->workflowStatus;
                $item->workflowId = $changeRow->workflowId;
                $item->workflowItemId = $changeRow->workflowItemId;
                $item->user = $changeRow->user->displayName;
                $item->dateTime = $changeRow->dateTime;
                $item->draft = $changeRow->draft;

            } else {

                $item = new WorkflowDefaultWorkflowItem($colRight);
                $item->id = $changeRow->id;
                $item->title = $workflowStatus->workflowStatus;

                if ($workflowStatus->modelClassName !== null) {
                    $item->model = new $workflowStatus->modelClassName();
                }

                $item->workflowItemId = $changeRow->workflowItemId;
                $item->user = $changeRow->user->displayName;
                $item->dateTime = $changeRow->dateTime;
                $item->draft = $changeRow->draft;

            }

            if ($changeRow->draft) {

                $btn = new BootstrapButton($colRight);
                $btn->content = 'Edit';

                if ($workflowStatus->formSite !== null) {
                    $btn->site = clone($workflowStatus->formSite);
                    $btn->site->addParameter(new WorkflowParameter($changeRow->workflowId));

                } else {
                    $btn->site = clone(WorkflowFormUpdateSite::$site);
                    $btn->site->addParameter(new WorkflowStatusChangeParameter($changeRow->id));
                }

                $btn = new BootstrapButton($colRight);
                $btn->content = 'Entwurf freigeben';
                $btn->site = clone(WorkflowDraftFreigabeSite::$site);
                $btn->site->addParameter(new WorkflowStatusChangeParameter($changeRow->id));

            }

        }


        $workflowRow = (new WorkflowReader())->getRowById($this->workflowId);

        if (!$workflowRow->draft) {

            $actionButton = new WorkflowActionButton($colRight);
            $actionButton->workflowId = $this->workflowId;

        }

        return parent::getHtml();
    }

}