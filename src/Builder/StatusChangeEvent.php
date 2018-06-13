<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
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

        //$dataId = (new WorkflowDataId())->getDataId($this->workflowId);

        $row = (new WorkflowReader())->getRowById($this->workflowId);
        return $row->dataId;


        //return $dataId;

    }


}