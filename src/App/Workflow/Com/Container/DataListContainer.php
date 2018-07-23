<?php

namespace Nemundo\Workflow\App\Workflow\Com\Container;

use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Core\Event\EventTrait;
use Nemundo\Core\Random\RandomUniqueId;
use Nemundo\Model\Admin\ModelAdmin;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Action\ActionUrlParameter;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeCount;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeValue;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeValue;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeCount;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Schleuniger\App\ChangeRequest\Parameter\ChangeRequestParameter;

class DataListContainer extends AbstractHtmlContainerList
{

    use EventTrait;

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;


    public function loadCom()
    {

        parent::loadCom();
        $this->loadEventCollection();

    }


    public function getHtml()
    {


        /** @var WorkflowEvent $workflowEvent */
        $workflowEvent = null;

        foreach ($this->afterSubmitEvent->getEventList() as $event) {

            if ($event->isObjectOfClass(WorkflowEvent::class)) {
                $workflowEvent = $event;
                $workflowEvent->draft = true;
            }


        }


        $workflowId = $workflowEvent->workflowId;  // (new ChangeRequestParameter())->getValue();


        $count = new StatusChangeCount();
        $count->filter->andEqual($count->model->workflowStatusId, $this->workflowStatus->id);
        $count->filter->andEqual($count->model->workflowId, $workflowId);

        if ($count->getCount() == 0) {


            //$event =


            /*
            $change = new StatusChangeBuilder();
            $change->workflowStatus = $this->workflowStatus;
            $change->workflowId = $this->workflowId;
            $change->workflowItemId = (new RandomUniqueId())->getUniqueId();
            $change->draft = true;
            $change->changeStatus();*/

            $this->afterSubmitEvent->run((new RandomUniqueId())->getUniqueId());

        }


        $value = new StatusChangeValue();
        $value->filter->andEqual($count->model->workflowStatusId, $this->workflowStatus->id);
        $value->filter->andEqual($count->model->workflowId, $workflowId);
        $value->field = $value->model->workflowItemId;
        $dataId = $value->getValue();


        $admin = new ModelAdmin($this);
        $admin->showViewButton = false;

        /** @var AbstractWorkflowBaseModel $model */
        $model = $this->workflowStatus->getModel();  // (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClasslListClass);

        $admin->model = $model;
        //$admin->filter->andEqual($model->workflowId, $this->workflowId);
        $admin->filter->andEqual($model->dataId, $dataId);
        $admin->model->dataId->defaultValue = $dataId;

        //$admin->model->workflowId->defaultValue = $this->workflowId;

        /*
        if ((new ActionUrlParameter())->getValue() == 'index') {
            $btn = new DraftReleaseButton($this);
            $btn->workflowId = $this->workflowId;
            $btn->redirectSite = $this->redirectSite;

        }*/


        return parent::getHtml();

    }

}