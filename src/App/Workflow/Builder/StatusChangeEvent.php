<?php

namespace Nemundo\Workflow\App\Workflow\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Factory\WorkflowDataId;

class StatusChangeEvent extends AbstractBase
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


    public function getDataId()
    {

        $row = (new WorkflowReader())->getRowById($this->workflowId);
        return $row->dataId;

    }

}