<?php

namespace Nemundo\Workflow\Form\Draft;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Form\Change\WorkflowChangeFormTrait;
use Nemundo\Workflow\Parameter\DraftEditParameter;


class WorkflowDraftChangeForm extends AbstractWorkflowDraftForm
{

    use WorkflowChangeFormTrait;

    /**
     * @var AbstractModel
     */
    //private $model;

    /**
     * @var string
     */
    public $dataId;


    protected function onSubmit()
    {

        $draftEditParameter = new DraftEditParameter();

        if (!$draftEditParameter->exists()) {

            $itemId = $this->saveData();

            $builder = new WorkflowStatusChangeBuilder();
            $builder->workflowId = $this->workflowId;
            $builder->workflowItemId = $itemId;
            $builder->workflowStatus = $this->workflowStatus;
            $builder->draft = $this->isDraft();
            $builder->changeStatus();

        } else {

            $this->updateData($draftEditParameter->getValue());

        }

    }

}