<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Event\AbstractContentEvent;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Html\Form\Event\AbstractAfterSubmitEvent;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeBuilder;

class WorkflowItemEvent extends AbstractAfterSubmitEvent
{

    /**
     * @var AbstractContentType
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;


    public function run($id)
    {


        $builder = new StatusChangeBuilder();
        $builder->workflowStatus = $this->workflowStatus;
        $builder->workflowId = $this->workflowId;
        $builder->workflowItemId = $id;
        $builder->changeStatus();

    }


}