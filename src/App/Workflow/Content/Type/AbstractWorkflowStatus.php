<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Content\Type\Menu\MenuContentTypeTrait;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Workflow\App\Workflow\Check\WorkflowCheck;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;


abstract class AbstractWorkflowStatus extends AbstractTreeContentType
{

    use UserAccessTrait;
    use SequenceContentTypeTrait;
    use MenuContentTypeTrait;
    use WorkflowStatusTrait;


    /**
     * @var AbstractWorkflowProcess
     */
    public $parentContentType;

    /**
     * @var bool
     */
    public $workflowCheck = true;

    public function saveContentLog($draft = false)
    {

        if ($this->workflowCheck) {
            //(new WorkflowCheck())->checkWorkflowStatus($this);
        }
        parent::saveContentLog($draft);

    }


    /**
     * @param string $sortOrder
     * @return AbstractTreeContentType[]|AbstractWorkflowStatus[]
     */
    public function getChild($sortOrder = SortOrder::ASCENDING)
    {
        return parent::getChild($sortOrder);
    }

}