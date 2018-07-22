<?php

namespace Nemundo\Workflow\App\Workflow\Process\Item;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Design\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Design\Bootstrap\Layout\BootstrapRow;
use Nemundo\Design\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\View\ModelView;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\App\Workflow\ContentItem\WorkflowItemContentItem;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Item\AbstractProcessItem;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\Parameter\DraftParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Site\StatusChange\StatusChangeSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Paranautik\App\Beta\Data\BetaTest\BetaTestReader;


class ProcessContentItem extends AbstractContentItem // AbstractProcessItem
{

    /**
     * @var string
     */
    //public $workflowId;

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


    }


    public function getHtml()
    {


        $this->statusChangeRedirectSite = StatusChangeSite::$site;


        /** @var AbstractWorkflowBaseModel $model */
        $model = $this->contentType->getModel();

       /*
        $reader = new ModelDataReader();
        $reader->model = $model;
        $reader->addFieldByModel($model);
        $row = $reader->getRowById($this->dataId);
        $workflowId = $row->getModelValue($model->workflow);*/

$workflowId = $this->dataId;

        $workflowRow = (new WorkflowReader())->getRowById($workflowId);

        $title = new WorkflowTitle($this);
        $title->workflowId = $workflowId;


        if ($this->showBaseData) {

            $h3 = new H5($this);
            $h3->content = 'Stammdaten';

            /** @var AbstractWorkflowBaseModel $model */
            $model = (new ModelFactory())->getModelByClassName($this->contentType->modelClass);

            $view = new WorkflowItemContentItem($this);
            $view->model = $model;
            $view->dataId = $this->dataId;

        }



        $h3 = new H5($this);
        $h3->content = 'Verlauf';


        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;

        $list = new BootstrapHyperlinkList($colLeft);

        $statusChangeReader = new StatusChangeReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->model->loadUser();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $workflowId);

        foreach ($statusChangeReader->getData() as $statusChangeItem) {

            $list->addHyperlink($statusChangeItem->workflowStatus->contentType, '#' . $statusChangeItem->workflowItemId);

            $div = new Div($colRight);
            $div->addCssClass('card');
            $div->addCssClass('mb-3');


            $headerDiv = new Div($div);
            $headerDiv->addCssClass('card-header');
            $headerDiv->content = $statusChangeItem->workflowStatus->contentType . ': ' . $statusChangeItem->user->displayName . ' ' . $statusChangeItem->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentDiv = new Div($div);
            $contentDiv->addCssClass('card-body');

            $workflowStatus = $statusChangeItem->workflowStatus->getContentTypeClassObject();

            $item = $workflowStatus->getItem($contentDiv);
            $item->dataId = $statusChangeItem->workflowItemId;

            if ($statusChangeItem->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeRedirectSite);
                $btn->site->addParameter(new WorkflowStatusParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new WorkflowParameter($workflowId));
                $btn->site->addParameter(new DraftEditParameter($statusChangeItem->workflowItemId));

                if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->workflowId = $workflowId;
                }
            }

        }

       /* if (!$workflowRow->draft) {

            $actionButton = new WorkflowActionButton($colRight);
            $actionButton->workflowId = $workflowId;
            $actionButton->statusChangeRedirectSite = $this->statusChangeRedirectSite;

        }*/

        return parent::getHtml();

    }

}