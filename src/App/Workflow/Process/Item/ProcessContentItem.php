<?php

namespace Nemundo\Workflow\App\Workflow\Process\Item;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Favorite\Com\FavoriteButton;
use Nemundo\Workflow\App\Subscription\Com\SubscriptionButton;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\App\Workflow\Com\Doc\WorkflowDoc;
use Nemundo\Workflow\App\Workflow\Com\WorkflowLogContainer;
use Nemundo\Workflow\App\Workflow\ContentItem\WorkflowItemContentItem;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\App\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;


class ProcessContentItem extends AbstractContentItem
{

    /**
     * @var AbstractSite
     */
    public $statusChangeRedirectSite;

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


    public function getHtml()
    {

        $workflowId = $this->dataId;

        $title = new WorkflowTitle($this);
        $title->workflowId = $workflowId;


        $btn = new SubscriptionButton($this);
        $btn->contentType = $this->contentType;
        $btn->dataId = $workflowId;

        $btn = new FavoriteButton($this);
        $btn->contentType = $this->contentType;
        $btn->dataId = $workflowId;


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

        $workflowLog = new WorkflowLogContainer($this);
        $workflowLog->workflowId = $this->dataId;
        $workflowLog->statusChangeSite = $this->statusChangeRedirectSite;


        /*
        if (!$workflowRow->draft) {

            $actionButton = new WorkflowActionButton($this);
            $actionButton->workflowId = $workflowId;
            $actionButton->statusChangeRedirectSite = $this->statusChangeRedirectSite;

        }*/

        return parent::getHtml();

    }

}