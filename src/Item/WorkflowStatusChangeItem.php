<?php

namespace Nemundo\Workflow\Item;


use Nemundo\Com\Container\AbstractContainer;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\User\Data\User\UserRow;
use Nemundo\Workflow\Com\Item\WorkflowItem;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStatusChangeItem extends AbstractBase
{


    /**
     * @var string
     */
    public $workflowItemId;

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var DateTime
     */
    public $dateTime;

    /**
     * @var UserRow
     */
    public $userRow;


    public function getView(AbstractContainer $parentCom = null)
    {

        $className = $this->workflowStatus->workflowItemViewClassName;

        /** @var  AbstractWorkflowItem $view */
        $view = new $className($parentCom); // this->workflowStatus->workflowItemViewClassName();
        $view->workflowItemId = $this->workflowItemId;

       /* if ($parentCom !== null) {
            $parentCom->addCom($view);
        }*/

        return $view;

    }


}