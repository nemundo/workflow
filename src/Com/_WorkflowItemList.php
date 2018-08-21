<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Basic\H5;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Listing\UnorderedList;
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
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Site\WorkflowActionPanelSite;
use Nemundo\Workflow\Site\DraftReleaseSite;
use Nemundo\Workflow\Site\WorkflowFormUpdateSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDraftDataWorkflowStatus;



// WorkflowViewList
class _WorkflowItemList extends AbstractProcessItem  // AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var string
     */
    //public $workflowId;

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

        $this->process = (new \Nemundo\Workflow\Builder\WorkflowItem($this->workflowId))->getProcess();


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
            $h3->content = 'Workflow Data';

            /** @var AbstractWorkflowBaseModel $model */
            $model = (new ModelFactory())->getModelByClassName($this->process->modelClass);

            $view = new WorkflowModelView($this);
            $view->model = $model;
            $view->filter->andEqual($model->workflowId, $this->workflowId);
        }


        $assignmentReader = new UserAssignmentReader();
        $assignmentReader->model->loadUser();
        $assignmentReader->filter->andEqual($assignmentReader->model->workflowId, $this->workflowId);

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
        $h3->content = 'Workflow Verlauf';


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
        $changeReader->addOrder($changeReader->model->itemOrder);
        foreach ($changeReader->getData() as $changeRow) {

            $workflowStatus = $changeRow->workflowStatus->getWorkflowStatusClassObject();
            //$workflowStatus->workflowId = $changeRow->workflowId;
            //$workflowStatus->dataId = $changeRow->dataId;

            $statusLabel = $workflowStatus->name;
            if ($changeRow->draft) {
                $statusLabel .= ' (Entwurf)';
            }

            $list->addHyperlink($statusLabel, '#' . $changeRow->id);


            if ($workflowStatus->isObjectOfClass(AbstractChangeWorkflowStatus::class)) {

                $div = new Div($colRight);
                $div->addCssClass('card');
                $div->addCssClass('mb-3');

                $headerDiv = new Div($div);
                $headerDiv->addCssClass('card-header');
                $headerDiv->content = $workflowStatus->name . ': ' . $changeRow->user->displayName . ' ' . $changeRow->dateTime->getShortDateTimeLeadingZeroFormat();

                $contentDiv = new Div($div);
                $contentDiv->addCssClass('card-body');

                //$contentDiv->content = $workflowStatus->workflowStatusText;

                /** @var WorkflowItem $item */
                $item = new $workflowStatus->itemClass($contentDiv);
                $item->dataId = $changeRow->dataId;

            }


            if ($workflowStatus->isObjectOfClass(AbstractDataWorkflowStatus::class)||$workflowStatus->isObjectOfClass(AbstractDraftDataWorkflowStatus::class)) {


                $div = new Div($colRight);
                $div->addCssClass('card');
                $div->addCssClass('mb-3');

                $headerDiv = new Div($div);
                $headerDiv->addCssClass('card-header');
                $headerDiv->content = $workflowStatus->name . ': ' . $changeRow->user->displayName . ' ' . $changeRow->dateTime->getShortDateTimeLeadingZeroFormat();


                $contentDiv = new Div($div);
                $contentDiv->addCssClass('card-body');

                //$contentDiv->content = $workflowStatus->workflowItemClassName;


                /** @var WorkflowItem $item */
                $item = new $workflowStatus->itemClass($contentDiv);
                $item->dataId = $changeRow->dataId;


                if ($changeRow->draft) {

                    $btn = new AdminButton($contentDiv);
                    $btn->content = 'Bearbeiten';
                    $btn->site = clone($this->statusChangeRedirectSite);
                    $btn->site->addParameter(new WorkflowStatusParameter($changeRow->workflowStatusId));
                    $btn->site->addParameter(new WorkflowParameter($this->workflowId));



                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->statusChangeId = $changeRow->id;


                }


            }




            if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {


                $div = new Div($colRight);
                $div->addCssClass('card');
                $div->addCssClass('mb-3');

                $headerDiv = new Div($div);
                $headerDiv->addCssClass('card-header');
                $headerDiv->content = $workflowStatus->name . ': ' . $changeRow->user->displayName . ' ' . $changeRow->dateTime->getShortDateTimeLeadingZeroFormat();

                $contentDiv = new Div($div);
                $contentDiv->addCssClass('card-body');

                //$contentDiv->content = $workflowStatus->workflowItemClassName;

                /** @var DataListWorkflowItemView $item */
                $item = new $workflowStatus->itemClass($contentDiv);
                $item->statusChangeId = $changeRow->id;


                if ($changeRow->draft) {

                    $btn = new AdminButton($contentDiv);
                    $btn->content = 'Bearbeiten';
                    $btn->site = clone($this->statusChangeRedirectSite);
                    $btn->site->addParameter(new WorkflowStatusParameter($changeRow->workflowStatusId));
                    $btn->site->addParameter(new WorkflowParameter($this->workflowId));

                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->statusChangeId = $changeRow->id;


                    /*
                    $btn = new AdminButton($contentDiv);
                    $btn->content = 'Freigeben';
                    $btn->site = clone(WorkflowDraftFreigabeSite::$site);
                    $btn->site->addParameter(new WorkflowStatusChangeParameter($changeRow->id));
*/

                }

            }



            /*
            if ($workflowStatus->workflowItemClassName !== null) {

                $div = new Div($colRight);
                $div->addCssClass('card');
                $div->addCssClass('mb-3');

                $headerDiv = new Div($div);
                $headerDiv->addCssClass('card-header');
                $headerDiv->content = $workflowStatus->workflowStatus. ': ' . $changeRow->user->displayName . ' ' . $changeRow->dateTime->getShortDateTimeLeadingZeroFormat();


                $contentDiv = new Div($div);
                $contentDiv->addCssClass('card-body');


                /** @var WorkflowItem $item */
            /*    $item = new $workflowStatus->workflowItemClassName($contentDiv);
                $item->dataId = $changeRow->dataId;

/*
                $item->id = $changeRow->id;
                $item->title = $workflowStatus->workflowStatus;
                $item->workflowId = $changeRow->workflowId;
                $item->dataId = $changeRow->dataId;
                $item->user = $changeRow->user->displayName;
                $item->dateTime = $changeRow->dateTime;
                $item->draft = $changeRow->draft;*/


            //}

            /*else {

                $item = new WorkflowDefaultWorkflowItem($colRight);
                $item->id = $changeRow->id;
                $item->title = $workflowStatus->workflowStatus;

                if ($workflowStatus->modelClassName !== null) {
                    $item->model = new $workflowStatus->modelClassName();
                }

                $item->dataId = $changeRow->dataId;
                $item->user = $changeRow->user->displayName;
                $item->dateTime = $changeRow->dateTime;
                $item->draft = $changeRow->draft;

            }*/


            /*
            if ($changeRow->draft) {

                $btn = new BootstrapButton($colRight);
                $btn->content = 'Edit';

                if ($workflowStatus->actionPanelClassName !== null) {
                    $btn->site = clone(WorkflowActionPanelSite::$site);
                    $btn->site->addParameter(new WorkflowStatusChangeParameter($changeRow->id));
                }



                if ($workflowStatus->formSite !== null) {
                    $btn->site = clone($workflowStatus->formSite);
                    $btn->site->addParameter(new WorkflowParameter($changeRow->workflowId));

                } else {
                //    $btn->site = clone(WorkflowFormUpdateSite::$site);
                //    $btn->site->addParameter(new WorkflowStatusChangeParameter($changeRow->id));
                }



                $btn = new BootstrapButton($colRight);
                $btn->content = 'Entwurf freigeben';
                $btn->site = clone(WorkflowDraftFreigabeSite::$site);
                $btn->site->addParameter(new WorkflowStatusChangeParameter($changeRow->id));

            }*/

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