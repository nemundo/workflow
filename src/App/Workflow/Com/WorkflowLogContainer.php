<?php

namespace Nemundo\Workflow\App\Workflow\Com;


use App\App\IssueTracking\Site\IssueEditSite;
use App\App\IssueTracking\Site\IssueStatusChangeSite;
use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

class WorkflowLogContainer extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractSite
     */
    public $statusChangeSite;

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

        foreach ($statusChangeReader->getData() as $statusChangeRow) {

            $list->addHyperlink($statusChangeRow->workflowStatus->contentType, '#' . $statusChangeRow->dataId);

            $div = new Div($colRight);
            $div->id = $statusChangeRow->dataId;
            $div->addCssClass('card');
            $div->addCssClass('mb-3');


            $statusText = $statusChangeRow->workflowStatus->contentType . ': ' . $statusChangeRow->user->displayName . ' ' . $statusChangeRow->dateTime->getShortDateTimeLeadingZeroFormat();

            if ($statusChangeRow->draft) {
                $statusText .= ' (Entwurf)';
            }

            $headerDiv = new Div($div);
            $headerDiv->addCssClass('card-header');
            $headerDiv->content = $statusText;

            $contentDiv = new Div($div);
            $contentDiv->addCssClass('card-body');

            $workflowStatus = $statusChangeRow->workflowStatus->getContentTypeClassObject();

            $item = $workflowStatus->getItem($contentDiv);
            $item->dataId = $statusChangeRow->dataId;

            /*
            $btn = new AdminButton($contentDiv);
            $btn->content = 'Bearbeiten';
            $btn->site = clone(IssueEditSite::$site);
            $btn->site->addParameter(new ContentTypeParameter($statusChangeItem->workflowStatusId));
            $btn->site->addParameter(new DataIdParameter($statusChangeItem->dataId));*/


            if ($statusChangeRow->draft) {


                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeSite);
                //$btn->site = clone(IssueStatusChangeSite::$site);
                $btn->site->addParameter(new ContentTypeParameter($statusChangeRow->workflowStatusId));
                $btn->site->addParameter(new DataIdParameter($statusChangeRow->dataId));
                $btn->site->addParameter(new DraftEditParameter());
                $btn->site->addParameter(new WorkflowParameter($statusChangeRow->workflowId));


                //$btn = new DraftReleaseButton($contentDiv);
                //$btn->workflowId = $statusChangeRow->workflowId;


            }


            /*
            if ($statusChangeItem->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeRedirectSite);
                //$btn->site->addParameter(new WorkflowStatusParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new ContentTypeParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new WorkflowParameter($workflowId));
                $btn->site->addParameter(new DraftEditParameter($statusChangeItem->dataId));

                if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->workflowId = $workflowId;
                }
            }*/

        }


        $workflowItem = new WorkflowItem($this->workflowId);


        //$workflowStatus = $workflowItem->getWorkflowStatus();

        $title = new AdminSubtitle($colLeft);
        $title->content = 'Nächste Schritte';
        $list = new UnorderedList($colLeft);

        foreach ($workflowItem->getNextWorkflowStatusList() as $nextWorkflowStatus) {
            $list->addText($nextWorkflowStatus->name);
        }


        if ((!$workflowItem->isClosed()) && (!$workflowItem->isDraft())) {

            $nextWorkflowStatus = $workflowItem->getWorkflowStatus()->getNextContentType();

            if ($nextWorkflowStatus !== null) {
                $btn = new AdminButton($colRight);
                $btn->content = 'Weiter';
                $btn->site = $this->statusChangeSite;
                $btn->site->addParameter(new WorkflowParameter($workflowItem->workflowId));
                $btn->site->addParameter(new ContentTypeParameter($nextWorkflowStatus->id));
            }

            // User Check
            /*   $title = new AdminSubtitle($colRight);
               $title->content = $nextWorkflowStatus->name;

               $form = $nextWorkflowStatus->getForm($colRight);

               $event = new WorkflowEvent();
               $event->workflowStatus = $nextWorkflowStatus;
               $event->workflowId = $this->workflowId;

               $form->afterSubmitEvent->addEvent($event);*/

        }


        return parent::getHtml();
    }

}