<?php

namespace Nemundo\Workflow\App\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\App\Workflow\ContentItem\WorkflowItemContentItem;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\App\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;

class WorkflowLogContainer extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;

    public function getHtml()
    {

        //$h3 = new H5($this);
        //$h3->content = 'Verlauf';


        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;

        $list = new BootstrapHyperlinkList($colLeft);

        $statusChangeReader = new StatusChangeReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->model->loadUser();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $this->workflowId);

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

            /*
            if ($statusChangeItem->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeRedirectSite);
                //$btn->site->addParameter(new WorkflowStatusParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new ContentTypeParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new WorkflowParameter($workflowId));
                $btn->site->addParameter(new DraftEditParameter($statusChangeItem->workflowItemId));

                if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->workflowId = $workflowId;
                }
            }*/

        }

        return parent::getHtml();
    }

}