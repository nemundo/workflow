<?php

namespace Nemundo\Workflow\Item;


use Nemundo\Com\Container\AbstractContainer;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\User\Data\User\UserRow;
use Nemundo\Workflow\Com\Item\AbstractWorkflowItemView;
use Nemundo\Workflow\Com\Item\WorkflowItem;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStatusChangeItem extends AbstractBase
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var string
     */
    public $workflowItemId;

    /**
     * @var string
     */
    public $statusChangeId;

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var bool
     */
    public $draft;

    /**
     * @var DateTime
     */
    public $dateTime;

    /**
     * @var UserRow
     */
    public $userRow;


    public function getStatus()
    {

        $status = $this->workflowStatus->name;
        if ($this->draft) {
            $status .= ' (Entwurf)';
        }
        return $status;

    }


    public function getView(AbstractContainer $parentCom = null)
    {

        $className = $this->workflowStatus->workflowItemViewClassName;

        /** @var  AbstractWorkflowItemView $view */
        $view = new $className($parentCom); // this->workflowStatus->workflowItemViewClassName();
        $view->workflowId = $this->workflowId;
        $view->workflowItemId = $this->workflowItemId;
        $view->workflowStatus = $this->workflowStatus;

        /* if ($parentCom !== null) {
             $parentCom->addCom($view);
         }*/

        return $view;

    }

}