<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Html\Form\Event\AbstractEvent;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;

class WorkflowStartEvent extends AbstractEvent
{

    /**
     * @var AbstractContentType
     */
    public $process;


    public function run($id)
    {


        $builder = new WorkflowBuilder();
        $builder->contentType = $this->process;
        //$builder->dataId = $dataId;
        $builder->workflowItemId = $id;
        //$builder->draft = $this->draft;
        $workflowId = $builder->createItem();




    }

}