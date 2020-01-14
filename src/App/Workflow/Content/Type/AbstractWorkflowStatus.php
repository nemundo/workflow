<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Content\Type\Menu\MenuContentTypeTrait;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Access\UserRestrictionTrait;
use Nemundo\Workflow\App\Workflow\Check\WorkflowCheck;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;


abstract class AbstractWorkflowStatus extends AbstractTreeContentType
{

    use UserRestrictionTrait;
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

        (new WorkflowCheck())->checkWorkflowStatus($this);

        parent::saveContentLog($draft);

    }


    /**
     * @param string $sortOrder
     * @return AbstractContentType[]|AbstractWorkflowStatus[]
     */
    public function getChild($sortOrder = SortOrder::ASCENDING)
    {

        return parent::getChild($sortOrder);

    }

}