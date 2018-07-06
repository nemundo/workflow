<?php

namespace Nemundo\Workflow\App\Workflow\ContentItem;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Design\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Design\Bootstrap\Layout\BootstrapRow;
use Nemundo\Design\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\Com\Item\DataListWorkflowItemView;
use Nemundo\Workflow\Com\Item\WorkflowDefaultWorkflowItem;
use Nemundo\Workflow\Com\Item\WorkflowItem;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\Com\View\WorkflowModelView;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Item\AbstractProcessItem;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\Parameter\DraftParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Reader\WorkflowStatusChangeItemReader;
use Nemundo\Workflow\Site\StatusChange\StatusChangeSite;
use Nemundo\Workflow\Site\WorkflowActionPanelSite;
use Nemundo\Workflow\Site\DraftReleaseSite;
use Nemundo\Workflow\Site\WorkflowFormUpdateSite;
use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractDraftDataWorkflowStatus;
use Schleuniger\App\Abweichungsreport\Data\Abweichungsreport\AbweichungsreportReader;


class WorkflowContentItem extends AbstractContentItem // AbstractProcessItem
{


    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractSite
     */
    public $statusChangeRedirectSite;


    /**
     * @var AbstractProcess
     */
    //public $process;

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


        //$abweichungsreportRow = (new AbweichungsreportReader())->getRowById($this->dataId);
        //$workflowId = $abweichungsreportRow->workflowId;

        $workflowRow = (new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader())->getRowById($this->workflowId);


        $title = new WorkflowTitle($this);
        $title->workflowId = $this->workflowId;


        if ($this->showBaseData) {

            $h3 = new H5($this);
            $h3->content = 'Stammdaten';

            /** @var AbstractWorkflowBaseModel $model */
            $model = (new ModelFactory())->getModelByClassName($this->contentType->modelClass);

            $view = new WorkflowItemContentItem($this);
            $view->model = $model;
            $view->dataId = $this->dataId;
            //$view->filter->andEqual($model->workflowId, $this->dataId);
        }


        $h3 = new H5($this);
        $h3->content = 'Verlauf';


        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;

        $list = new BootstrapHyperlinkList($colLeft);


        $statusChangeReader = new WorkflowStatusChangeReader();  // new WorkflowStatusChangeItemReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->model->loadUser();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $this->workflowId);
        //$statusChangeReader->workflowId = $this->dataId;  //workflowId;
        //$statusChangeReader->sortOrder = $this->sortOrder;

        foreach ($statusChangeReader->getData() as $statusChangeItem) {


            $list->addHyperlink($statusChangeItem->workflowStatus->workflowStatus, '#' . $statusChangeItem->workflowItemId);

            $div = new Div($colRight);
            $div->addCssClass('card');
            $div->addCssClass('mb-3');


            $headerDiv = new Div($div);
            $headerDiv->addCssClass('card-header');
            $headerDiv->content = $statusChangeItem->workflowStatus->workflowStatus . ': ' . $statusChangeItem->user->displayName . ' ' . $statusChangeItem->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentDiv = new Div($div);
            $contentDiv->addCssClass('card-body');

            $workflowStatus = $statusChangeItem->workflowStatus->getWorkflowStatusClassObject();
            $item = $workflowStatus->getItem($contentDiv);
            $item->dataId = $statusChangeItem->workflowItemId;


            //$statusChangeItem->getView($contentDiv);


            if ($statusChangeItem->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeRedirectSite);
                $btn->site->addParameter(new WorkflowStatusParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new WorkflowParameter($this->workflowId));
                $btn->site->addParameter(new DraftEditParameter($statusChangeItem->workflowItemId));


                if ($statusChangeItem->workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->workflowId = $this->workflowId;
                }
            }

        }

        if (!$workflowRow->draft) {

            $actionButton = new WorkflowActionButton($colRight);
            $actionButton->workflowId = $this->workflowId;
            $actionButton->statusChangeRedirectSite = $this->statusChangeRedirectSite;

        }

        return parent::getHtml();

    }

}