<?php

namespace Nemundo\Workflow\Com\View;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Button\BootstrapButton;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\App\Workflow\Content\Item\DataListWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Content\Item\WorkflowDefaultWorkflowItem;
use Nemundo\Workflow\App\Workflow\Content\Item\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\Com\View\WorkflowModelView;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Item\AbstractProcessItem;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\App\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\App\Workflow\Parameter\DraftParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Reader\WorkflowStatusChangeItemReader;
use Nemundo\Workflow\Site\StatusChange\StatusChangeSite;
use Nemundo\Workflow\Site\WorkflowActionPanelSite;
use Nemundo\Workflow\Site\DraftReleaseSite;
use Nemundo\Workflow\Site\WorkflowFormUpdateSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDraftDataWorkflowStatus;


class WorkflowViewList extends AbstractProcessItem
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var bool
     */
    public $showSubscription = false;

    /**
     * @var bool
     */
    public $showBaseData = true;

    /**
     * @var SortOrder
     */
    public $sortOrder = SortOrder::ASCENDING;

    protected function loadCom()
    {
        parent::loadCom();

        $this->statusChangeRedirectSite = StatusChangeSite::$site;

    }

    public function getHtml()
    {

        $this->process = (new \Nemundo\Workflow\App\Workflow\Builder\WorkflowItem($this->workflowId))->getProcess();


        if (!$this->checkProperty('workflowId')) {
            exit;
        }

        /*if (!$this->checkObject('process', $this->process, AbstractProcess::class)) {
            exit;
        }*/


        $title = new WorkflowTitle($this);
        $title->workflowId = $this->workflowId;

        if ($this->showSubscription) {

            $btn = new SubscriptionButton($this);
            $btn->applicationType = $this->process;
            $btn->workflowId = $this->workflowId;

        }


        if ($this->showBaseData) {

            $h3 = new H5($this);
            $h3->content = 'Stammdaten';

            /** @var AbstractWorkflowBaseModel $model */
            $model = (new ModelFactory())->getModelByClassName($this->process->modelClass);

            $view = new WorkflowModelView($this);
            $view->model = $model;
            $view->filter->andEqual($model->workflowId, $this->workflowId);
        }


        $assignmentReader = new UserAssignmentReader();
        $assignmentReader->model->loadUser();
        $assignmentReader->filter->andEqual($assignmentReader->model->workflowId, $this->workflowId);
        $assignmentReader->filter->andEqual($assignmentReader->model->delete, false);

        if ($assignmentReader->getCount() > 0) {

            $h3 = new H5($this);
            $h3->content = 'Benutzer Zuweisung';
            //$h3->content = 'User Assignment';

            $list = new UnorderedList($this);


            foreach ($assignmentReader->getData() as $assignmentRow) {
                $list->addText($assignmentRow->user->login);
            }
        }


        $assignmentReader = new UsergroupAssignmentReader();
        $assignmentReader->model->loadUsergroup();
        $assignmentReader->filter->andEqual($assignmentReader->model->workflowId, $this->workflowId);
        $assignmentReader->filter->andEqual($assignmentReader->model->delete, false);

        if ($assignmentReader->getCount() > 0) {

            $h3 = new H5($this);
            $h3->content = 'Benutzergruppe Zuweisung';
            //$h3->content = 'Usergroup Assignment';

            $list = new UnorderedList($this);

            foreach ($assignmentReader->getData() as $assignmentRow) {
                $list->addText($assignmentRow->usergroup->usergroup);
            }

        }

        $h3 = new H5($this);
        $h3->content = 'Verlauf';


        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;

        $list = new BootstrapHyperlinkList($colLeft);


        $statusChangeReader = new WorkflowStatusChangeItemReader();
        $statusChangeReader->workflowId = $this->workflowId;
        $statusChangeReader->sortOrder = $this->sortOrder;

        foreach ($statusChangeReader->getData() as $statusChangeItem) {

            $list->addHyperlink($statusChangeItem->getStatus(), '#' . $statusChangeItem->dataId);

            $div = new Div($colRight);
            $div->addCssClass('card');
            $div->addCssClass('mb-3');

            $headerDiv = new Div($div);
            $headerDiv->addCssClass('card-header');
            $headerDiv->content = $statusChangeItem->getStatus() . ': ' . $statusChangeItem->userRow->displayName . ' ' . $statusChangeItem->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentDiv = new Div($div);
            $contentDiv->addCssClass('card-body');

            //$statusChangeItem->getView($contentDiv);



            if ($statusChangeItem->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeRedirectSite);
                $btn->site->addParameter(new WorkflowStatusParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new WorkflowParameter($this->workflowId));
                $btn->site->addParameter(new DraftEditParameter($statusChangeItem->dataId));


                if ($statusChangeItem->workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->workflowId = $this->workflowId;
                }
            }

        }

        $workflowRow = (new WorkflowReader())->getRowById($this->workflowId);

        if (!$workflowRow->draft) {

            $actionButton = new WorkflowActionButton($colRight);
            $actionButton->workflowId = $this->workflowId;
            $actionButton->statusChangeRedirectSite = $this->statusChangeRedirectSite;

        }

        return parent::getHtml();

    }

}