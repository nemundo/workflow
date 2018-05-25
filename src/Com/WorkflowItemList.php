<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Design\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Design\Bootstrap\Layout\BootstrapRow;
use Nemundo\Design\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Model\Factory\ModelFactory;
use Schleuniger\App\Application\Type\AbstractWorkflowApplication;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Site\WorkflowDraftFreigabeSite;
use Nemundo\Workflow\Site\WorkflowFormUpdateSite;
use Nemundo\Workflow\Status\AbstractWorkflowStatus;
use Schleuniger\Com\Button\SchleunigerButton;


class WorkflowItemList extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowApplication
     */
    public $application;

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

        if (!$this->checkObject('application', $this->application, AbstractWorkflowApplication::class)) {
            exit;
        }


        $title = new WorkflowTitle($this);
        $title->workflowId = $this->workflowId;

        if ($this->showSubscription) {

            $btn = new SubscriptionButton($this);
            $btn->applicationType = $this->application;
            $btn->workflowId = $this->workflowId;

        }


        if ($this->showBaseData) {

            $h3 = new H5($this);
            $h3->content = 'Workflow Data';

            $model = (new ModelFactory())->getModelByClassName($this->application->baseModelClassName);


            $view = new WorkflowModelView($this);
            $view->model = $model;
            $view->filter->andEqual($model->workflowId, $this->workflowId);
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
        $changeReader->filter->andEqual($changeReader->model->workflowId, $this->workflowId);
        foreach ($changeReader->getData() as $changeRow) {

            $workflowStatus = $changeRow->workflowStatus->getWorkflowStatusClassObject();
            $workflowStatus->workflowId = $changeRow->workflowId;
            $workflowStatus->workflowItemId = $changeRow->workflowItemId;

            $statusLabel = $workflowStatus->statusLabel;
            if ($changeRow->draft) {
                $statusLabel .= ' (Entwurf)';
            }


            $list->addHyperlink($statusLabel, '#' . $changeRow->id);

            if ($workflowStatus->workflowItemClassName !== null) {

                /** @var WorkflowItem $item */
                $item = new $workflowStatus->workflowItemClassName($colRight);
                $item->id = $changeRow->id;
                $item->title = $workflowStatus->statusLabel;
                $item->workflowId = $changeRow->workflowId;
                $item->workflowItemId = $changeRow->workflowItemId;
                $item->user = $changeRow->user->displayName;
                $item->dateTime = $changeRow->dateTime;

            } else {

                $item = new WorkflowDefaultWorkflowItem($colRight);
                $item->id = $changeRow->id;
                $item->title = $workflowStatus->statusLabel;

                if ($workflowStatus->modelClassName !== null) {
                    $item->model = new $workflowStatus->modelClassName();
                }

                $item->workflowItemId = $changeRow->workflowItemId;
                $item->user = $changeRow->user->displayName;
                $item->dateTime = $changeRow->dateTime;

            }

            if ($changeRow->draft) {

                $btn = new SchleunigerButton($colRight);
                $btn->content = 'Edit';

                if ($workflowStatus->formSite !== null) {
                    $btn->site = clone($workflowStatus->formSite);
                    $btn->site->addParameter(new WorkflowParameter($changeRow->workflowId));

                } else {
                    $btn->site = clone(WorkflowFormUpdateSite::$site);
                    $btn->site->addParameter(new WorkflowStatusChangeParameter($changeRow->id));
                }

                $btn = new SchleunigerButton($colRight);
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